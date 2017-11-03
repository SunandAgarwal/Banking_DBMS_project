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
                Account_Number bigint PRIMARY KEY,
                Employee_ID int,
                Foreign Key(Account_Number) References accounts (Account_Number),
                Foreign Key(Employee_ID) References employees (Employee_ID)
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
