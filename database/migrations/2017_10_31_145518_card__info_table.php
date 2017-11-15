<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CardInfoTable extends Migration
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
            CREATE TABLE card__info (
                Card_No bigint NOT NULL PRIMARY KEY,
                CVV varchar(255) NOT NULL,
                Valid_Thru varchar(8) NOT NULL,
                Card_Holder text,
                Type text NOT NULL,
                PIN varchar(255) NOT NULL,
                Account_Number bigint NOT NULL,
                Status text NOT NULL,
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
        // drop table
        DB::statement("
            DROP TABLE IF EXISTS card__info
        ");
    }
}
