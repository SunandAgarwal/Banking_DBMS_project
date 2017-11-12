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
}
