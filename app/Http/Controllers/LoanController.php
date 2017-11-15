<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Takes_Loan;
use App\Account;

class LoanController extends Controller
{
    // repay the loan
    public function repay() {
        // get all loans available
        $loan = new Loan;
        $loan = $loan->getAllLoans();
        return view('LoanServices.repay', [
            'loans' => $loan
        ]);
    }

    // update the money
    public function updateMoney() {
    	$details = Account::getAccountDetails(auth()->id());
        $account_number = $details->Account_Number;

        // create trigger if not exists for updating the balance
        Loan::createUpdateBalTrigger();
        
        $loanNo = Loan::getLoanNumber(request('type'), request('period'));
    	Takes_Loan::updateTakesLoan(request()->all(), $account_number, $loanNo);
    	return redirect('/accountSummary');
    }
}
