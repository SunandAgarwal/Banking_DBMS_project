<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    // insert the details of the Customer
    public function insert_data_customer($user) {
    	// getting the name
    	$name = explode(" ", $user['name']); 	
    	if(count($name) == 2) 
    		$middle_name = NULL;
    	else
    		$middle_name = $name[1];

    	// generating the account number, and check that if it is not assigned to someone
    	$account_number = rand(1000000000, 9999999999);
    	$check_acc = DB::select("SELECT Account_Number FROM accounts WHERE Account_Number = ?" , array($account_number));
        if($check_acc == $account_number) 
            $account_number++;

    	// insert query, prepare and bind using inbuilt function
    	DB::insert(DB::raw('
			INSERT INTO customers (first_name, middle_name, last_name, Father_name, Street, City, State, PIN_Code, Gender, Date_of_birth, Email, Aadhar_number, Account_Number) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
    	'), array($name[0], $middle_name, $name[count($name) - 1], $user['fname'], $user['street'], $user['city'], $user['state'], $user['pin'], $user['gender'], $user['dob'], $user['email'], $user['aadhar_no'], $account_number));
    }
}
