<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Transaction;

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

    // show the statement for specified period
    public function specified_form() {
        return view('accountServices.specifiedPeriodForm');
    }

    public function specified_show() {
        $details = Account::getAccountDetails(auth()->id());
        $account_number = $details->Account_Number;
        $transaction = Transaction::getTransactionDate(request()->all(), $account_number);
        $heading = "For A Specified Period";
        return view('accountServices.miniStatement', compact('transaction', 'heading'));
    }

    public function showTransactionHistory() {
        $details = Account::getAccountDetails(auth()->id());
        $account_number = $details->Account_Number;
        $transaction = Transaction::transactionHistory($account_number);
        $heading = "Transaction History";
        return view('accountServices.miniStatement', compact('transaction', 'heading'));
    }

}
