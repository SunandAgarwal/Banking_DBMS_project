<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cust_Phone extends Model
{
    public static function insert_phone_customer($cust_id, $phone) {
       	foreach($phone as $phone_no)
       		if($phone_no!=NULL)
    			DB::insert("
					INSERT INTO cust__phones VALUES (?, ?)
	    			", array($cust_id, $phone_no) );
    }
}
