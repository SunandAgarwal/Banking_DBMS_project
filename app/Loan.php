<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    // CREATE INSERT BALANCE TRIGGER
    public static function createInsertBalTrigger() {
        DB::unprepared("
            DROP TRIGGER IF EXISTS insertAmtLoan;
        ");
        DB::unprepared("       
            CREATE TRIGGER insertAmtLoan
            AFTER INSERT ON takes__loan
            FOR EACH ROW
            BEGIN
                UPDATE accounts SET balance = balance + new.Loan_Amount;
            END
        ");
    }

    // return all loans
    public function getAllLoans() {
    	$loan = DB::select("
			SELECT * FROM loans;
    	");
    	return $loan;
    }

    public static function getInterest($type, $period) {
    	$interest = DB::select("
			SELECT Interest_rate FROM loans
			WHERE Type = '$type' AND Period = $period
    	");
        // since it is a single record
        $interest = $interest[0]->Interest_rate;
    	return $interest;
    }

    public static function getLoanNumber($type, $period) {
        $loanNo = DB::select("
            SELECT Loan_No FROM loans
            WHERE Type = '$type' AND Period = $period
        ");
        // since it is a single record
        $loanNo = $loanNo[0]->Loan_No;
        return $loanNo;
    }

    public static function checkExistingLoan($account_number, $type) {
        $check = DB::select("
            SELECT Type FROM takes__loan NATURAL JOIN loans
            WHERE Account_Number = $account_number AND Type = '$type'
        ");
        if($check == NULL) 
            return 0;
        else {
            return 1;
        }
    }

    // CREATE UPDATE BALANCE TRIGGER
    public static function createUpdateBalTrigger() {
        DB::unprepared("
            DROP TRIGGER IF EXISTS updateAmtLoan;
        ");
        DB::unprepared("       
            CREATE TRIGGER updateAmtLoan
            AFTER UPDATE ON takes__loan
            FOR EACH ROW
            BEGIN
                UPDATE accounts SET balance = balance - (old.Pending_Amount - new.Pending_Amount) 
                WHERE Account_Number = old.Account_Number
                AND (balance - (old.Pending_Amount - new.Pending_Amount)) >= 0;      
            END
        ");
    }
    
}

