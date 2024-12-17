<?php

namespace App\Services;

use App\Models\PromoCode;
use App\Models\TripayLog;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
    public function createTransaction($method, $amount, $customerData, $merchantRef)
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

    public function updateMoney($ID, $amount): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'money' => $user->money += $amount
        ]);
    }

    public function inviteBy($uid)
    {
        $user = User::where('invite_code', User::whereId($uid)->value('referral_code'))->first();
        if ($user) {
            return $user->ID;
        } else {
            return null;
        }
    }

    public function updateCashback($ID, $cb): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'bonuses' => $user->bonuses += $cb
        ]);
    }

    public function getStreamerID($promoCode)
    {
        $streamer = PromoCode::where('promo_code', 'like', $promoCode)->first();

        if ($streamer) {
            return $streamer->streamer_id;
        } else {
            return null; // Or any other appropriate handling for the absence of records
        }
    }
    /**
     * Handle callback notification from Tripay.
     */
    public function handleCallback($request)
    {
        $json = $request->getContent();
        $callbackSignature = $request->header('X-Signature');
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        // Log incoming request for debugging
        Log::info('Tripay Callback Received', ['raw_data' => $json]);

        // Verify signature
        if ($signature !== $callbackSignature) {

            Log::error('Tripay Callback: Invalid signature', ['received_signature' => $callbackSignature, 'expected_signature' => $signature]);
            throw new \Exception('Invalid callback signature');
        }

        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Tripay Callback: Invalid JSON', ['error' => json_last_error_msg()]);
            throw new \Exception('Invalid callback JSON');
        }

        // Process callback
        $invoiceId = $data['merchant_ref'];
        $status = strtoupper($data['status']);


        $invoice = TripayLog::where('reference_id', $invoiceId)
            ->where('status', 'PENDING')
            ->first();

        if (!$invoice) {
            Log::warning('Tripay Callback: Invoice not found or already processed', ['invoice_id' => $invoiceId]);
            throw new \Exception("Invoice not found or already processed: $invoiceId");
        }

        switch ($status) {
            case 'PAID':
                case 'PAID':
                    // Pastikan money adalah angka yang valid
                    if (is_numeric($invoice->money)) {
                        $cb = $invoice->money * 0.1;
                    } else {
                        Log::error('Invalid money value', ['money' => $invoice->money]);
                        $cb = 0; // Set default value
                    }
                
                    $inviter = $this->inviteBy($invoice->user_id);
                    
                    // Pastikan amount adalah angka yang valid
                    if (is_numeric($invoice->amount)) {
                        $this->updateMoney($invoice->user_id, $invoice->amount);
                        
                        if ($inviter !== null) {
                            $this->updateMoney($inviter, $invoice->amount * 0.015);
                        }
                    } else {
                        Log::error('Invalid amount value', ['amount' => $invoice->amount]);
                    }
                
                    // Pastikan promo_code ada sebelum digunakan
                    $ids = !empty($invoice->promo_code) ? $this->getStreamerID($invoice->promo_code) : null;
                    if ($ids !== null) {
                        $this->updateCashback($ids, $cb);
                    }
                
                    // Update status invoice
                    $invoice->update(['status' => 'PAID']);
                    
                    Log::info('Tripay Callback: Invoice marked as PAID', ['invoice_id' => $invoiceId]);
                    break;
            case 'EXPIRED':
                $invoice->update(['status' => 'EXPIRED']);
                Log::info('Tripay Callback: Invoice marked as EXPIRED', ['invoice_id' => $invoiceId]);
                break;
            case 'FAILED':
                $invoice->update(['status' => 'FAILED']);
                Log::info('Tripay Callback: Invoice marked as FAILED', ['invoice_id' => $invoiceId]);
                break;
            default:
                Log::error('Tripay Callback: Unrecognized status', ['status' => $status]);
                throw new \Exception("Unrecognized payment status: $status");
        }
    }
}
