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

    //for getting the account details
    public static function getAccountDetails($id) {
    	// get user details
    	$user_detail = DB::select("
			SELECT email, user_type FROM users WHERE id = ?
    	", array($id));
    	$user_detail = $user_detail[0];

    	if($user_detail->user_type == 'employee') {
    		// get the id of the user
    		$user_id = DB::select("
				SELECT Employee_ID FROM employees WHERE Email = ?
    		", array($user_detail->email));
    		$user_id = $user_id[0];

    		// get the account number
    		$user_account_number = DB::select("
				SELECT Account_Number FROM emp__acc WHERE Employee_ID = ?
    		", array($user_id->Employee_ID));
    		$user_account_number = $user_account_number[0];

    		// get the account details
    		$details = DB::select("
				SELECT * FROM accounts WHERE Account_Number = ?
    		", array($user_account_number->Account_Number));
    		$details = $details[0];

    		return $details;
    	}
    	else {
    		// get the id of the user
    		$user_account_number = DB::select("
				SELECT Account_Number FROM customers WHERE Email = ?
    		", array($user_detail->email));
    		$user_account_number = $user_account_number[0];

    		// get the account details
    		$details = DB::select("
				SELECT * FROM accounts WHERE Account_Number = ?
    		", array($user_account_number->Account_Number));
    		$details = $details[0];

    		return $details;
    	}
    }

    //to deposit money.
    public static function deposit_money($deposit_details) {
        $amount = $deposit_details['amt'];
        $balance = DB::select("
            SELECT Balance FROM accounts WHERE Account_Number = ?
        ", array($deposit_details['account_number']));
        $balance = $balance[0]->Balance;
        $balance = $balance + $amount;

        DB::update("
            UPDATE accounts SET Balance = ? WHERE Account_Number = ?
        ", array($balance, $deposit_details['account_number']));
    }

    //to send money.
    public static function send_money($send_details) {
        $amount = $send_details['amt'];
        $acc_no = DB::select("
            SELECT Account_Number FROM accounts WHERE Account_Number <> ?
        ", array($send_details['account_number']));
        $beneficiary_account_number = $send_details['beneficiary_account_number'];
        $check = 0; 
        foreach($acc_no as $acc_no)
        {
            $acc_no = $acc_no->Account_Number;
            if($acc_no == $beneficiary_account_number)
            {
                $check++;
                $beneficiary_balance = DB::select("
                    SELECT Balance FROM accounts WHERE Account_Number = ?
                    ", array($beneficiary_account_number));
                $beneficiary_balance = $beneficiary_balance[0]->Balance;
                $balance = DB::select("
                    SELECT Balance FROM accounts WHERE Account_Number = ?
                    ", array($send_details['account_number']));
                $balance = $balance[0]->Balance;
                $balance = $balance - $amount;
                $beneficiary_balance = $beneficiary_balance + $amount;

                DB::update("
                    UPDATE accounts SET Balance = ? WHERE Account_Number = ?
                 ", array($balance, $send_details['account_number']));
                DB::update("
                    UPDATE accounts SET Balance = ? WHERE Account_Number = ?
                 ", array($beneficiary_balance, $send_details['beneficiary_account_number']));

                break;
            }
        }
        return $check;
    }
}
