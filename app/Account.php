<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
	// generate the cheque number
	static function generate_cheque($issue_cheque) {
		if($issue_cheque == 1) {
			// do something
			$cheque_number = rand(100000,999999);
	        // avoid duplicate entries of account number
	        while(true) {
	            $cheque = DB::select("SELECT Cheque_Book_No FROM accounts WHERE Cheque_Book_No = ?" , array($cheque_number));
	            if($cheque == NULL ) break;
	            else if ($cheque[0] -> Cheque_Book_No == $cheque_number)
	            $cheque_number++;
        	}

        	return $cheque_number;
		}

		else
			return NULL;
	}

    // insert into account
    public function insert_into_account ($account_number, $user) {
    	DB::insert("
			INSERT INTO accounts VALUES (?, ?, ?, ?, ?, NOW())
    	", array($account_number, $user['type'], 0, 'open', Account::generate_cheque($user['issue_cheque']) ) );
    }

    public function update_account($account_number) {
    	DB::update("
			UPDATE accounts
			SET Type = 'Joint'
			WHERE Account_Number = $account_number
    	");
    }

}
