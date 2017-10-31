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
                Card_No int NOT NULL PRIMARY KEY,
                CVV int(3) NOT NULL,
                Valid_Thru int NOT NULL,
                Card_Holder text,
                Type text NOT NULL,
                PIN int NOT NULL,
                Account_Number int NOT NULL
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
