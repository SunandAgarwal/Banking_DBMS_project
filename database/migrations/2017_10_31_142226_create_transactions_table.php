<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE transactions
            (
                Transaction_ID bigint Primary key,
                Date date,
                Time time,
                Debit real,
                Credit real,
                Type text NOT NULL,
                Account_Number bigint NOT NULL,
                Sender_Acc_No bigint,
                Beneficiary_Acc_No bigint,
                Foreign Key(Account_Number) References accounts (Account_Number)
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
        Schema::dropIfExists('transactions');
    }
}
