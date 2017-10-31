<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TakesLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create table
        DB::statement("
            CREATE TABLE takes__loan(
                Account_Number int,
                Loan_No int,
                Loan_Amount real NOT NULL,
                Monthly_Installment real NOT NULL,
                Pending_Amount int NOT NULL,
                Collateral_Guarantor text NOT NULL,
                PRIMARY KEY(Account_Number, Loan_No)
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop table
         Schema::dropIfExists('takes__loan');
    }
}
