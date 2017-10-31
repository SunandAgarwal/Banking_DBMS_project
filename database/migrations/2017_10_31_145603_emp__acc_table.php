<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpAccTable extends Migration
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
            CREATE TABLE emp__acc (
                Account_Number int PRIMARY KEY,
                Employee_ID int
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
            DROP TABLE IF EXISTS emp__acc
        ");
    }
}
