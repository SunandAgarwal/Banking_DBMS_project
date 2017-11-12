<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Transaction;

class AccountController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
    // to fetch user the details
	public function services() {
		return view('accountServices.accountServices');
	}

	public function summary() {
		$account = Account::getAccountDetails(auth()->id());
		return view('accountServices.accountSummary', compact('account'));
	}

	public function statement() {
		return view('accountServices.accountStatement');
	}

	public function miniStatement() {
		$details = Account::getAccountDetails(auth()->id());
		$transaction = Transaction::getTransactionDetails($details->Account_Number);
		$heading = "Mini Statement";
		return view('accountServices.miniStatement', compact('transaction', 'heading'));
	}
}
