<?php

namespace App\Services;

use App\Models\TripayLog;
use Illuminate\Support\Facades\Http;

class TripayService
{
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $baseUrl;
    protected $Url;

    public function __construct()
    {

        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->baseUrl = config('tripay.sandbox') === false
            ? 'https://tripay.co.id/api/transaction/create'
            : 'https://tripay.co.id/api-sandbox/transaction/create';

        $this->Url = config('tripay.sandbox') === false
            ? 'https://tripay.co.id/api/merchant/payment-channel'
            : 'https://tripay.co.id/api-sandbox/merchant/payment-channel';
    }
    /**
     * Mendapatkan daftar metode pembayaran yang tersedia.
     */
    public function getPaymentMethods()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->get($this->Url);

        // Jika request gagal, lempar exception
        if ($response->failed()) {
            throw new \Exception('Tripay API Error: ' . $response->body());
        }

        // Decode JSON untuk mendapatkan data pembayaran
        $data = $response->json();

        // Filter hanya yang aktif
        $paymentMethods = [];
        foreach ($data['data'] as $method) {
            $paymentMethods[] = [
                'code' => $method['code'],
                'name' => $method['name'],
            ];
        }

        return $paymentMethods;
    }
    public function createTransaction($method, $amount, $customerData)
    {
        $merchantRef = 'INV-' . time();
        $orderItems = [
            [
                'name'        => 'Top-up Balance',
                'price'       => $amount,
                'quantity'    => 1,
            ],
        ];
        $returnUrl = config('tripay.returnUrl');
        $data = [
            'method'         => $method, // Ganti metode jika diperlukan
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => $customerData['name'],
            'customer_email' => $customerData['email'],
            'customer_phone' => $customerData['phone'],
            'order_items'    => $orderItems,
            'return_url'     => $returnUrl,
            'expired_time'   => time() + (24 * 60 * 60), // 24 jam
            'signature'      => hash_hmac('sha256', $this->merchantCode . $merchantRef . $amount, $this->privateKey),
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->baseUrl, $data);

        if ($response->failed()) {
            throw new \Exception('Tripay API Error: ' . $response->body());
        }

        return $response->json();
    }
    /**
     * Handle the callback notification from Tripay.
     */
    public function handleCallback($request)
    {
        $json = $request->getContent(); // Ambil konten request sebagai JSON
        $signature = hash_hmac('sha256', $json, $this->privateKey); // Generate signature menggunakan HMAC

        // Signature dari header yang dikirimkan Tripay
        $callbackSignature = $request->header('X-Signature');

        // Verifikasi signature
        if ($signature !== $callbackSignature) {
            throw new \Exception('Signature tidak valid');
        }

        // Decode JSON untuk mengambil data transaksi
        $data = json_decode($json, true);
        // buat log
        \Log::info($data);  

        // Ambil data dari callback
        $trx_id = $data['trx_id'];
        $status = $data['status'];
        $amount = $data['amount'];

        // Cari transaksi yang sesuai dengan trx_id
        $transaction = TripayLog::where('trx_id', $trx_id)->first();

        if (!$transaction) {
            throw new \Exception('Transaksi tidak ditemukan');
        }

        // Perbarui status transaksi sesuai dengan status dari callback
        $transaction->status = $this->mapStatus($status);
        $transaction->amount = $amount;
        $transaction->save();

        return response()->json(['message' => 'Status transaksi berhasil diperbarui']);
    }

    /**
     * Pemetaan status callback ke status yang sesuai di sistem.
     */
    protected function mapStatus($status)
    {
        switch ($status) {
            case 'pending':
                return 'pending';
            case 'success':
                return 'berhasil';
            case 'expired':
                return 'expired';
            default:
                return 'pending'; // default status
        }
    }
}
