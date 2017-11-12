<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;

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
}
