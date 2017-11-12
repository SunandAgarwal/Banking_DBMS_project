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

	//to generate transaction id.
	public static function generate_transaction_id() {
		$transaction_id = rand(1000000, 9999999);
		while(true)
		{
			$check_transaction_id = DB::select("
				SELECT Transaction_ID FROM transactions WHERE Transaction_ID = ?
			", array($transaction_id));
			if($check_transaction_id == NULL)
				break;
			else if($check_transaction_id[0]->Transaction_ID == $transaction_id)
				$transaction_id++;
		}
		return $transaction_id;
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

        //insert into transactions table.
        $transaction_id = Transaction::generate_transaction_id();

        DB::insert("
			INSERT INTO transactions (Transaction_ID, Date, Time, Credit, Type, Account_Number) VALUES (?, CURDATE(), TIME(NOW()), ?, 'Deposit', ?)
        ", array($transaction_id, $amount, $deposit_details['account_number']));

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

                if($balance >= 0)
                {
                	$check++;
                	 DB::update("
	                    UPDATE accounts SET Balance = ? WHERE Account_Number = ?
	                 ", array($balance, $send_details['account_number']));
	                DB::update("
	                    UPDATE accounts SET Balance = ? WHERE Account_Number = ?
	                 ", array($beneficiary_balance, $send_details['beneficiary_account_number']));

	                //insert into transactions table.
			        $transaction_id = Transaction::generate_transaction_id();

			        DB::insert("
						INSERT INTO transactions (Transaction_ID, Date, Time, Debit, Type, Account_Number, Sender_Acc_No, Beneficiary_Acc_No) VALUES (?, CURDATE(), TIME(NOW()), ?, 'Money Transfer', ?, ?, ?)
			        ", array($transaction_id, $amount, $send_details['account_number'], $send_details['account_number'], $beneficiary_account_number));

			        $transaction_id = Transaction::generate_transaction_id();

			        DB::insert("
						INSERT INTO transactions (Transaction_ID, Date, Time, Credit, Type, Account_Number, Sender_Acc_No, Beneficiary_Acc_No) VALUES (?, CURDATE(), TIME(NOW()), ?, 'Money Transfer', ?, ?, ?)
			        ", array($transaction_id, $amount, $beneficiary_account_number, $send_details['account_number'], $beneficiary_account_number));

	                break;
                }
            }
        }
        return $check;
    }
}
