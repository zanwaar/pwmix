<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BankAccountController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        return view( 'front.streamer.bankaccount', [
            'bankaccount' => BankAccount::whereUserId( Auth::user()->ID )->get(),
        ] );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $validate = $request->validate( [
            'account_name' => 'required',
            'bank_type' => 'required',
            'account_number' => 'required|numeric',

        ] );
        $validate[ 'user_id' ] = Auth::user()->ID;

        $add = BankAccount::create( $validate );
        if ( !$add ) {

            return redirect( route( 'bankaccount.index' ) )->with( 'error', 'Bank Account created failed' );
        }
        return redirect( route( 'bankaccount.index' ) )->with( 'success', 'Bank Account created successfully' );

    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, $id ) {
        $bankaccount = BankAccount::find( $id );

        if ( !$bankaccount ) {
            return redirect( route( 'bankaccount.index' ) )->with( 'error', 'Bank Account not found' );
        }

        $validate = $request->validate( [
            'account_name' => 'required',
            'bank_type' => 'required',
            'account_number' => 'required|numeric',

        ] );

        $edit = $bankaccount->update( $validate );
        if ( !$edit ) {
            return redirect( route( 'bankaccount.index' ) )->with( 'error', 'Bank Account update failed' );
        }
        return redirect( route( 'bankaccount.index' ) )->with( 'success', 'Bank Account update successfully' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( $id ) {
        $bankaccount = BankAccount::find( $id );
        $adawd = DB::table( 'withdrawals' )
        ->where( 'bankaccount_id', $id )
        ->first();

        if ( $adawd ) {
            return redirect( route( 'bankaccount.index' ) )->with( 'error', 'Gagal Hapus , Bank/EWallet Telah ada Transaksi' );
        }

        if ( !$bankaccount ) {
            return redirect( route( 'bankaccount.index' ) )->with( 'error', 'Bank Account deleted failed' );
        } else {
            $bankaccount->delete();

            return redirect( route( 'bankaccount.index' ) )->with( 'success', 'Bank Account deleted successfully' );
        }
    }
}