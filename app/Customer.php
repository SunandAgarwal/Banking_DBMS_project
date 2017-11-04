<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	$name = explode(" ", $user['name']);
	$account_number = rand(1000000000, 9999999999);

    public function insert_data_customers($user)
    {
    	if(count($name) == 3)
    		$middle_name = NULL;
    	else
    		$middle_name = $name[1];

    	DB::statement("
			INSERT INTO customers (first_name, middle_name, last_name, Father_name, Street, City, State, PIN_Code, Gender, Date_of_birth, Email, Aadhar_number, Account_number) VALUES(
				'$name[0]', '$middle_name', '$name[count($name)-1]', '$user['fname']', '$user['street']', '$user['city']', '$user['state']', '$user['pin']', '$user['gender']', '$user['dob']', '$user['email']', '$user['aadhar_no']', '$account_number'
			)
    		");
    }
}
