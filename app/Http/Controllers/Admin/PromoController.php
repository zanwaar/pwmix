<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PromoController extends Controller
{
    public function refundBonuses($ID, $amounts): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'bonuses' => $user->bonuses += $amounts
        ]);
    }
    public function index()
    {
        
        $promos = PromoCode::leftjoin('users', 'users.ID', '=', 'promo_codes.streamer_id')
            ->select('users.bonuses', 'promo_codes.*')
            ->orderByRaw("CASE WHEN promo_codes.status = 'active' THEN 0 ELSE 1 END, promo_codes.created_at DESC")
            ->get();

        return view('admin.promo.index', compact('promos'));
    }
    public function getWD()
    {
        $histowd = DB::table('withdrawals')
            ->leftjoin('users', 'withdrawals.processed_by', '=', 'users.id')
            ->join('promo_codes', 'withdrawals.streamer_id', '=', 'promo_codes.streamer_id')
            ->leftJoin('bank_accounts', 'withdrawals.bankaccount_id', '=', 'bank_accounts.id')
            // ->whereWithdrawalMethod('RUPIAH')
            ->select('users.truename', 'withdrawals.*', 'promo_codes.streamer_name', 'bank_accounts.bank_type', 'bank_accounts.account_number', 'bank_accounts.account_name')
            ->orderByRaw("CASE WHEN withdrawals.status = 'pending' THEN 0 ELSE 1 END, withdrawals.updated_at DESC")
            ->get();
        return view('admin.promo.withdraw', [
            'histowd' => $histowd,
        ]);
    }

    public function updateWD(Request $request, $trx)
    {
        $trxwd = Withdrawal::find($trx);

        if (!$trxwd) {
            return redirect(route('admin.withdraw'))->with('error', 'Gagal Update Transksi WD !');
        }

        $request->merge(['status' => $request->status]);

        $validate = $request->validate([
            'status' => 'required|in:berhasil,gagal',
        ]);

        if ($validate['status'] == 'berhasil') {
            $validate['processed_by'] = Auth::id();
            $trxwd->update($validate);
            return redirect(route('admin.withdraw'))->with('success', 'Transaksi WD di Terima !');
        } elseif ($validate['status'] == 'gagal') {
            $ID = $trxwd->streamer_id;
            $amounts = $trxwd->amount;
            $validate['processed_by'] = Auth::id();
            $validate['comments'] = 'Saldo reffund';
            $this->refundBonuses($ID, $amounts);
            $trxwd->update($validate);
            return redirect(route('admin.withdraw'))->with('error', 'Transaksi WD di Tolak ! Dana Di kembalikan ke Streamer');
        }

    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $request->merge(['promo_code' => strtoupper($request->promo_code)]);
        $request->merge(['streamer_name' => strtoupper($request->streamer_name)]);

        $validate = $request->validate([
            'promo_code' => 'required|min:3',
            'streamer_name' => 'required|min:3',
        ]);

        if (PromoCode::create($validate)) {
            return redirect(route('promocode.index'))->with('success', 'Code Berhasil Di Generate');
        } else {
            return redirect(route('promocode.index'))->with('error', 'Code Gagal Di Generate');
        }


    }

    public function show($id)
    {
        $promos = PromoCode::where('id', $id)->first();

        if (!$promos) {
            return redirect()->route('promo.index')->with('error', 'Promo not found');
        }

        return view(route('promocode.index'), compact('promos'));
    }



    public function update(Request $request, $id)
    {
        $promocode = PromoCode::find($id);
        if (!$promocode) {
            return redirect(route('promocode.index'));
        }
        $request->merge(['promo_code' => strtoupper($request->promo_code)]);
        $request->merge(['streamer_name' => strtoupper($request->streamer_name)]);

        $validate = $request->validate([
            'promo_code' => 'required|min:3',
            'streamer_name' => 'required|min:5',
            'status' => 'required|in:active,inactive',
        ]);

        $promocode->update($validate);

        return redirect(route('promocode.index'))->with('success', 'Code Berhasil Di Update');
    }

    public function destroy($id)
    {
        $promocode = PromoCode::find($id);

        if (!$promocode) {
            return redirect(route('promocode.index'))->with('error', 'Data Tidak Ditemukan');
        }

        $promocode->delete();

        return redirect(route('promocode.index'))->with('success', 'Success Hapus Data');
    }
}