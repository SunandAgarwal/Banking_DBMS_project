<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE emp__phones (
                Employee_ID int,
                Phone_No bigint,
                PRIMARY KEY(Employee_ID, Phone_No),
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
        Schema::dropIfExists('emp__phones');
    }
}
