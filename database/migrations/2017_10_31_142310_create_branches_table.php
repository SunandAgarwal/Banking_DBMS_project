<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE branches
            (
                IFSC_Code varchar(15) Primary key,
                Assets real NOT NULL,
                Street varchar(25),
                City varchar(15) NOT NULL,
                State varchar(15) NOT NULL,
                PIN_Code int NOT NULL
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
        Schema::dropIfExists('branches');
    }
}
