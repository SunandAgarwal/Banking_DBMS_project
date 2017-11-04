<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emp_Phone extends Model
{
    // insert into the database
    public static function insert_phone($employee_id, $phones) {
    	// dd($phones);
    	foreach ($phones as $phone) {
    		if($phone != NULL) {
	    		DB::insert("
					INSERT INTO emp__phones VALUES (?, ?)
	    		", array($employee_id, $phone) );
	    	}
    	}
    }
}
