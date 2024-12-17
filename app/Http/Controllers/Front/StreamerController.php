<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Streamer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IpaymuLog;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Withdrawal;

class StreamerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMoney($ID, $amounts): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'money' => $user->money += $amounts
        ]);
    }
    public function subtractBonuses($ID, $amounts): void
    {
        $user = User::whereId($ID)->firstOrFail();
        $user->update([
            'bonuses' => $user->bonuses -= $amounts
        ]);
    }
    public function getHistoryPlayer()
    {
        $pc = Auth::user()->promoCode();
        $histop = DB::table('pwp_ipaymu')
            ->leftjoin('users', 'pwp_ipaymu.user_id', '=', 'users.id')
            ->where('pwp_ipaymu.promo_code', 'like', $pc)
            ->where('pwp_ipaymu.status_code', '1')
            ->select('users.truename', 'pwp_ipaymu.*')
            ->orderBy('pwp_ipaymu.updated_at', 'desc')
            ->get();

        return view('front.streamer.historytopup', [
            'histopup' => $histop,
        ]);
    }

    public function getHistoryWD()
    {
        $histowd = DB::table('withdrawals')
            ->leftJoin('users', 'withdrawals.processed_by', '=', 'users.id')
            ->leftJoin('bank_accounts', 'withdrawals.bankaccount_id', '=', 'bank_accounts.id')
            ->where('withdrawals.streamer_id', Auth::id())
            ->select('users.truename as author', 'bank_accounts.bank_type', 'bank_accounts.account_number', 'withdrawals.*')
            ->orderByRaw("CASE WHEN withdrawals.status = 'pending' THEN 0 ELSE 1 END, withdrawals.updated_at DESC")
            ->get();

        return view('front.streamer.historywd', [
            'histowd' => $histowd,
        ]);
    }

    public function getWD()
    {
        $pm = Auth::user()->promoCode();
        $alltimeballance = IpaymuLog::where('promo_code', 'like', $pm)
            ->where('status_code', '1')
            ->sum('money');
        $ballance = Auth::user()->bonuses;
        $wdsuccessrp = Withdrawal::where('streamer_id', Auth::id())
            ->whereWithdrawalMethod('RUPIAH')
            ->whereStatus('berhasil')
            ->sum('amount');
        $wdsuccesscn = Withdrawal::where('streamer_id', Auth::id())
            ->whereWithdrawalMethod('COIN')
            ->whereStatus('berhasil')
            ->sum('amount');
        $rekening = BankAccount::whereUserId(Auth::id())->get();
        return view('front.streamer.withdraw', [
            'alltimeballance' => $alltimeballance,
            'wdsuccessrp' => $wdsuccessrp,
            'wdsuccesscn' => $wdsuccesscn,
            'ballance' => $ballance,
            'rekening' => $rekening,
        ]);
    }

    public function postWD(Request $request)
    {
        $onwallet = Auth::user()->bonuses;
        $metode = $request->post('metode');

        if (!$metode) {
            return redirect(route('app.withdraw'))->with('error', 'Pilih Metode Penarikan !');
        }

        if ($metode === 'RUPIAH') {
            $messages = [
                'bankaccount_id.required' => 'Kolom rekening bank wajib diisi.',
                'bankaccount_id.exists' => 'Rekening bank yang dipilih tidak valid.',
                'amount.required' => 'Kolom Saldo wajib diisi.',
                'amount.numeric' => 'Kolom Saldo harus berupa nilai numerik.',
                'amount.min' => 'Nilai pada kolom Saldo harus minimal 50.000.',
                'amount.max' => 'Saldo anda hanya tersedia ' . $onwallet,
            ];

            $validator = Validator::make($request->input(), [
                'metode' => 'required',
                'bankaccount_id' => 'required|exists:bank_accounts,id',
                'amount' => 'required|numeric|min:50000|max:' . $onwallet,
            ], $messages);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Penarikan Gagal !');
            }

            $this->subtractBonuses(Auth::id(), $request->input('amount'));
            $add = Withdrawal::create([
                'streamer_id' => Auth::id(),
                'bankaccount_id' => $request->input('bankaccount_id'),
                'amount' => $request->input('amount'),
                'date' => Carbon::now()->format('YmdHis'),
                'withdrawal_method' => $request->input('metode'),
                'transaction_id' => 'WDPWCR-' . Carbon::now()->format('YmdHis'),
                'status' => 'pending',
                'comments' => '-',
                'processed_by' => '',
            ]);


            if (!$add) {

                return redirect(route('app.withdraw'))->with('error', 'Withdraw Gagal !');
            }
            return redirect(route('app.withdraw'))->with('success', 'Withdraw Berhasil Diajukan');

        } elseif ($metode === 'COIN') {
            $messages = [
                'amount.required' => 'Kolom Saldo wajib diisi.',
                'amount.numeric' => 'Kolom Saldo harus berupa nilai numerik.',
                'amount.min' => 'Nilai pada kolom Saldo harus minimal 50.000.',
                'amount.max' => 'Saldo anda hanya tersedia ' . $onwallet,
            ];

            $validator = Validator::make($request->input(), [
                'metode' => 'required',
                'amount' => 'required|numeric|min:50000|max:' . $onwallet,
            ], $messages);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Penarikan Gagal !');
            }
            $amounts = $request->input('amount') * 0.001;
            $this->updateMoney(Auth::id(), $amounts + ($amounts * 0.2));
            $this->subtractBonuses(Auth::id(), $request->input('amount'));
            $add = Withdrawal::create([
                'streamer_id' => Auth::id(),
                'bankaccount_id' => $request->input('bankaccount_id'),
                'amount' => $amounts,
                'date' => Carbon::now()->format('YmdHis'),
                'withdrawal_method' => $request->input('metode'),
                'transaction_id' => 'WDPWCR-' . Carbon::now()->format('YmdHis'),
                'status' => 'berhasil',
                'comments' => 'Auto',
                'processed_by' => '',
            ]);
            if (!$add) {

                return redirect(route('app.withdraw'))->with('error', 'Withdraw Gagal ! Kode : 182637');
            }
            return redirect(route('app.withdraw'))->with('success', 'Withdraw Berhasil Diajukan');


        } else {
            return redirect(route('app.withdraw'))->with('error', 'Metode Penarikan Tidak Tersedia !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Streamer  $streamer
     * @return \Illuminate\Http\Response
     */

    public function show(Streamer $streamer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Streamer  $streamer
     * @return \Illuminate\Http\Response
     */

    public function edit(Streamer $streamer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Streamer  $streamer
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Streamer $streamer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Streamer  $streamer
     * @return \Illuminate\Http\Response
     */

    public function destroy(Streamer $streamer)
    {
        //
    }
}
