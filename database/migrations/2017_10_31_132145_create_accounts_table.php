<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE accounts (
                Account_Number bigint PRIMARY KEY,
                Type text NOT NULL,
                Balance real NOT NULL,
                Status text NOT NULL,
                Cheque_Book_No bigint,
                Registered_time datetime
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
        Schema::dropIfExists('accounts');
    }
}
