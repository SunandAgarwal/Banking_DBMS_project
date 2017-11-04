<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Cust_Phone;

class Customer extends Model
{

    public static function generate_account() {
        // generating the account number, and check that if it is not assigned to someone
        $account_number = rand(1000000000,9999999999);
        // avoid duplicate entries of account number
        while(true) {
            $check_acc = DB::select("SELECT Account_Number FROM accounts WHERE Account_Number = ?" , array($account_number));
            if($check_acc == NULL ) break;
            else if ($check_acc[0] -> Account_Number == $account_number)
            $account_number++;
        }

        return $account_number;
    }

    // insert the details of the Customer
    public function insert_data_customer($user) {
    	// getting the name
    	$name = explode(" ", $user['name']); 	
    	if(count($name) == 2)
    		$middle_name = NULL;
    	else
    		$middle_name = $name[1];

        $account_number = Customer::generate_account();

    	// insert query, prepare and bind using inbuilt function
    	DB::insert(DB::raw('
			INSERT INTO customers (first_name, middle_name, last_name, Father_name, Street, City, State, PIN_Code, Gender, Date_of_birth, Email, Aadhar_number, Account_Number) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
    	'), array($name[0], $middle_name, $name[count($name) - 1], $user['fname'], $user['street'], $user['city'], $user['state'], $user['pin'], $user['gender'], $user['dob'], $user['email'], $user['aadhar_no'], $account_number));
        // end inserting into the customers table

        $cust_id = DB::select("
			SELECT Customer_ID FROM customers WHERE Aadhar_number = ?
        	", array($user['aadhar_no']));
        $cust_id = $cust_id[0]->Customer_ID;

        Cust_Phone::insert_phone_customer($cust_id, $user['phone']);

        // insert into accounts
        $account = new Account;
        $account -> insert_into_account($account_number, $user);
    }

    public function insert_into_joint($user) {
        // getting the name
        $name = explode(" ", $user['name']);    
        if(count($name) == 2)
            $middle_name = NULL;
        else
            $middle_name = $name[1];

        // insert query, prepare and bind using inbuilt function
        DB::insert(DB::raw('
            INSERT INTO customers (first_name, middle_name, last_name, Father_name, Street, City, State, PIN_Code, Gender, Date_of_birth, Email, Aadhar_number, Account_Number) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
        '), array($name[0], $middle_name, $name[count($name) - 1], $user['fname'], $user['street'], $user['city'], $user['state'], $user['pin'], $user['gender'], $user['dob'], $user['email'], $user['aadhar_no'], $user['account_number'] ));
        // end inserting into the customers table

        $cust_id = DB::select("
			SELECT Customer_ID FROM customers WHERE Aadhar_number = ?
        	", array($user['aadhar_no']));
        $cust_id = $cust_id[0]->Customer_ID;

        Cust_Phone::insert_phone_customer($cust_id, $user['phone']);

        $account = new Account;
        $account -> update_account( $user['account_number'] );
    }


}
