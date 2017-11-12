<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    // get the transaction details
    public static function getTransactionDetails($account_number) {
    	$transaction = DB::select("
			SELECT * FROM transactions WHERE Account_Number = ? 
			ORDER BY Date ASC LIMIT 10
    	", array($account_number));

    	return $transaction;
    }

    public static function getTransactionDate($dates, $account_number) {
    	$transaction = DB::select("
			SELECT * FROM transactions WHERE Account_Number = $account_number
			AND Date >= ? AND Date <= ?
    	", array($dates['from'], $dates['to']));

    	return $transaction;
    }

    public static function transactionHistory($account_number) {
    	$transaction = DB::select("
			SELECT * FROM transactions WHERE Account_Number = $account_number
    	");

    	return $transaction;
    }

}
