<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Takes_Loan;
use App\Account;

class TakesLoanController extends Controller
{
	// provide access to authorised user
	public function __construct() {
		$this->middleware('auth');
	}

    // return takes loan form
    public function takeForm() {
    	// get all loans available
    	$loan = new Loan;
    	$loan = $loan->getAllLoans();
    	return view('LoanServices.takeLoan', [
    		'loans' => $loan
    	]);
    }

    public function issueLoan() {
        // create trigger if not exists for updating the balance
        Loan::createInsertBalTrigger();
        // insert into takes_loan table
        $details = Account::getAccountDetails(auth()->id());
        $account_number = $details->Account_Number;
        $loanNo = Loan::getLoanNumber(request('type'), request('period'));
        $check_loan = Loan::checkExistingLoan($account_number, $loanNo);
        if($check_loan == 0) {
            $loan = new Takes_Loan;
            $interestRate = Loan::getInterest(request('type'), request('period'));
            $loan = $loan->insertTakeLoan(request()->all(), $account_number, $interestRate, $loanNo);
            // A TRIGGER FOR UPDATING THE BALNCE HAS BEEN MADE HENCE IT WILL UPDATE THE BALANCE
            return redirect('accountSummary');
        }
        else {
            return back()->withErrors([
                'message' => "Loan Already Taken!"
            ]);
        }
    }
}
