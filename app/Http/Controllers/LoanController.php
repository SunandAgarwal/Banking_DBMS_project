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
        // remove duplicates
        $type_array = array();
            $period_array = array();
            foreach($loan as $loan) {
                array_push($type_array, $loan->Type);
                array_push($period_array, $loan->Period);
            }
            $type_array = array_unique($type_array);
            $period_array = array_unique($period_array);
            return view('LoanServices.repay', [
                'type' => $type_array,
                'period' => $period_array
            ]);
    }

    // update the money
    public function updateMoney() {
    	$details = Account::getAccountDetails(auth()->id());
        $account_number = $details->Account_Number;

        // create trigger if not exists for updating the balance
        Loan::createUpdateBalTrigger();
        
        $loanNo = Loan::getLoanNumber(request('type'), request('period'));
    	$check = Takes_Loan::updateTakesLoan(request()->all(), $account_number, $loanNo);
        if($check == 1)
    	   return redirect('/accountSummary');
        else if ($check == 0) {
            return back()->withErrors([
                'message' => 'You\'ve not taken this loan!'
            ]);
        }
        else {
            return back()->withErrors([
                'message' => 'You Can\'t Pay!'
            ]);
        }
    }
}
