<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE employees (
                Employee_ID int PRIMARY KEY,
                first_name varchar(15) NOT NULL,
                middle_name varchar(15),
                last_name varchar(15) NOT NULL,
                Street text,
                City text,
                Pin_Code int NOT NULL,
                Gender enum('M','F','O') NOT NULL,
                Date_Of_birth date NOT NULL,
                Email text,
                Aadhar_number int NOT NULL,
                Designation text NOT NULL,
                Salary int NOT NULL,
                IFSC_Code varchar(15) NOT NULL,
                Foreign Key (IFSC_Code) References branches(IFSC_Code)
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
        Schema::dropIfExists('employees');
    }
}
