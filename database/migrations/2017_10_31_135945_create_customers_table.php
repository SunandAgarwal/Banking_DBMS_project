<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE customers
            (
                Customer_ID int PRIMARY KEY AUTO_INCREMENT,
                first_name varchar(15) NOT NULL,
                middle_name varchar(15),
                last_name varchar(15) NOT NULL,
                Father_name varchar(25) NOT NULL,
                Street varchar(25),
                City varchar(15),
                State varchar(15),
                PIN_Code int NOT NULL,
                Gender enum('M', 'F', 'O') NOT NULL,
                Date_of_birth date NOT NULL,
                Email varchar(25),
                Aadhar_number int NOT NULL,
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
        Schema::dropIfExists('customers');
    }
}
