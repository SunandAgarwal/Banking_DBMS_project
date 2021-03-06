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
                Account_Number bigint,
                Loan_No bigint,
                Loan_Amount real NOT NULL,
                Monthly_Installment real NOT NULL,
                Pending_Amount real NOT NULL,
                Collateral_Guarantor text NOT NULL,
                PRIMARY KEY(Account_Number, Loan_No),
                Foreign Key(Account_Number) References accounts (Account_Number),
                Foreign Key(Loan_No) References loans (Loan_No)
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
