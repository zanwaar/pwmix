<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers;

use App\Models\IpaymuLog;
use App\Models\Paymentwall;
use App\Models\User;
use App\Models\PromoCode;
use App\Models\TripayLog;
use App\Services\TripayService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Paymentwall_Config;
use Paymentwall_Pingback;

class Pingback extends Controller
{
    protected $tripayService;

    public function __construct()
    {

        $tripayService = new TripayService();
        $this->tripayService = $tripayService;

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


    public function updateMoney($ID, $amount): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'money' => $user->money += $amount
        ]);
    }
    public function updateCashback($ID, $cb): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'bonuses' => $user->bonuses += $cb
        ]);
    }

    public function createLog($id, $amount, $refid, $type): void
    {
        Paymentwall::create([
            'userID' => $id,
            'amount' => $amount,
            'refid' => $refid,
            'type' => $type
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

    public function paymentwall()
    {
        Paymentwall_Config::getInstance()->set([
            'api_type' => Paymentwall_Config::API_VC,
            'public_key' => config('pw-config.payment.paymentwall.project_key'),
            'private_key' => config('pw-config.payment.paymentwall.secret_key')
        ]);

        $pingback = new Paymentwall_Pingback($_GET, $_SERVER['REMOTE_ADDR']);

        if ($pingback->validate()) {
            $userID = $pingback->getUserId();
            $amount = $pingback->getVirtualCurrencyAmount();
            $refID = $pingback->getReferenceId();
            $type = $pingback->getType();

            // Payment success
            if ($type === 0) {
                $this->updateMoney($userID, $amount);
            }

            // Send by costumer service
            if ($type === 1) {
                $this->updateMoney($userID, $amount);
            }

            // Payment failed
            if ($type === 2) {
                $this->updateMoney($userID, $amount);
            }
            $this->createLog($userID, $amount, $refID, $type);
            return 'OK';
        } else {
            return $pingback->getErrorSummary();
        }
    }

    public function IpaymuCallback(Request $request)
    {
        $trx_id = $request->get('trx_id');
        $status = $request->get('status');
        $status_code = $request->get('status_code');
        $sid = $request->get('sid');
        $reference_id = $request->get('reference_id');

        $check = IpaymuLog::whereSid($sid)->whereStatus('pending')->whereStatusCode('0')->firstOrFail();
        if ($check !== null) {

            $update = IpaymuLog::whereSid($sid);
            $update->update([
                'trx_id' => $trx_id,
            ]);

            if ($status == 'berhasil' && $status_code == '1') {
                $update->update([
                    'status' => 'berhasil',
                    'status_code' => '1'
                ]);
                $user = $update->firstOrFail();
                $cb = $user->money * 0.1;
                $inviter = $this->inviteBy($user->user_id);
                if ($inviter !== null) {
                    $this->updateMoney($user->user_id, $user->amount);
                    $this->updateMoney($inviter, $user->amount * 0.015);
                } else {
                    $this->updateMoney($user->user_id, $user->amount);
                }
                $ids = $this->getStreamerID($user->promo_code);
                $this->updateCashback($ids, $cb);

                $message = 'success';

            } elseif ($status == 'expired' && $status_code == '-2') {
                $update->update([
                    'status' => 'expired',
                    'status_code' => '2'
                ]);

            }
            return $message = 'success update trx id';
            
        } else {
            $message = 'failed';
        }
        return $message;
    }

    public function TripayCallback(Request $request)
    {
        try {
            return $this->tripayService->handleCallback($request);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
