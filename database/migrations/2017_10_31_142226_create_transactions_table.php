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
                Transaction_ID int Primary key,
                Date date,
                Time time,
                Debit real,
                Credit real,
                Type text NOT NULL,
                Account_Number int NOT NULL,
                Sender_Acc_No int,
                Beneficiary_Acc_No int
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
