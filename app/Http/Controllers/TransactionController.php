<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class TransactionController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    //to show the deposit page.
    public function deposit_show() {
    	$details = Account::getAccountDetails(auth()->id());
    	$account_number = $details->Account_Number;
    	return view('transactions.deposit', compact('account_number'));
    }

    //to deposit money.
    public function deposit() {
    	Account::deposit_money(request()->all());

    	return redirect('/accountSummary');
    }

    //to show the send page.
    public function send_show() {
    	$details = Account::getAccountDetails(auth()->id());
    	$account_number = $details->Account_Number;
    	return view('transactions.send', compact('account_number'));
    }

    //to send money.
    public function send() {
    	$check = Account::send_money(request()->all());
    	if($check > 0)
    		return redirect('/home');
    	else
    		return back()->withErrors([
                'message' => 'Invalid Beneficiary Details!'
            ]);
    }
}
