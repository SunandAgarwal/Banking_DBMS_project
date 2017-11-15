<?php

namespace App\Http\Controllers;
use App\Card_Info;
use App\Account;

use Illuminate\Http\Request;

class CardInfoController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function cardServices() {
		return view('card.cardServices');
	}

	public function issueCard() {
		$account_details = Account::getAccountDetails(auth()->id());
		$account_number = $account_details->Account_Number;
		$check = Card_Info::check_card($account_number);
		if($check == 0)
			return view('card.issueCard');
		else
			return back()->withErrors([
				'message' => 'You already have a card!'
			]);
	}

	public function store_card_info() {
		$account_details = Account::getAccountDetails(auth()->id());
		$account_number = $account_details->Account_Number;
		Card_Info::generate_card($account_number, request()->all());
		return redirect('card_info');
	}

	public function card_info() {
		$account_details = Account::getAccountDetails(auth()->id());
		$account_number = $account_details->Account_Number;
		$card_info = Card_Info::show_card_info($account_number);
		if($card_info == NULL)
			return back()->withErrors([
				'message' => 'You don\'t have a card!'
			]);
		else
			return view('card.card_info', compact('card_info'));
	}

	//to show the block card page.
	public function block_card() {
		$account_details = Account::getAccountDetails(auth()->id());
		$account_number = $account_details->Account_Number;
		$card_info = Card_Info::show_card_info($account_number);
		if($card_info == NULL)
			return back()->withErrors([
				'message' => 'You don\'t have a card!'
			]);
		else
			return view('card.blockCard', compact('card_info'));
	}

	public function blockCard() {
		Card_Info::block_card(request()->all());
		return redirect('/');
	}
}
