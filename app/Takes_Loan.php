<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Takes_Loan extends Model
{
        // insert into takes loan table
   public function insertTakeLoan($takeLoan, $account_number, $interest, $loanNo) {     		  // calculate the monthly installment
       $totalAmt = $takeLoan['amt'] * ($interest * $takeLoan['period'] / 100);
       $totalAmt += $takeLoan['amt'];
       $monthlyInstallment = $totalAmt / ($takeLoan['period'] * 12);

       $pending_amount = $totalAmt;

       // insert into the table
       DB::insert("
          INSERT INTO takes__loan VALUES ($account_number, $loanNo, ?, $monthlyInstallment, $pending_amount, ?)
       ", array($takeLoan['amt'], $takeLoan['collateral']));
    }

    public static function updateTakesLoan($request, $account_number, $loanNo) {
    	// get pending amount
    	$pending_amount = DB::select("
			SELECT pending_amount FROM takes__loan	
			WHERE Account_Number = $account_number AND Loan_No = $loanNo
    	");
    	$pending_amount = $pending_amount[0]->pending_amount;
    	$pending_amount = $pending_amount - $request['amt'];

    	$monthlyInstallment = $pending_amount / ($request['period'] * 12);

    	DB::statement("
			UPDATE takes__loan SET Pending_Amount = $pending_amount,
			Monthly_Installment = $monthlyInstallment
			WHERE Account_Number = $account_number AND Loan_No = $loanNo
    	");
    }
}
