<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emp_Acc extends Model
{
    // insert into the table
    public static function insert_into($account_number, $emp_id) {
    	DB::insert("
			INSERT INTO emp__acc VALUES (?, ?)
    	", array($account_number, $emp_id));
    }
}
