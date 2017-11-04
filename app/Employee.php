<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Emp_Phone;
use App\Customer;
use App\Account;
use App\Emp_Acc;

class Employee extends Model
{
	static function generate_salary($designation){
		if($designation == 'ma')
			return 50000;
		else if($designation == 'po')
			return 40000;
		else if($designation == 'so')
			return 35000;
		else if($designation == 'oa')
			return 25000;
	}

    public function insert_data_employee($user) {
    	// getting the name
    	$name = explode(" ", $user['name']); 	
    	if(count($name) == 2)
    		$middle_name = NULL;
    	else
    		$middle_name = $name[1];

    	$salary = Employee::generate_salary($user['designation']);

    	$ifsc = DB::select("
			SELECT IFSC_Code FROM branches
			ORDER BY RAND() LIMIT 1
    		");
    	$ifsc_code = $ifsc[0]->IFSC_Code;

    	// insert query, prepare and bind using inbuilt function
    	DB::insert(DB::raw('
			INSERT INTO employees (first_name, middle_name, last_name, Street, City, State, Pin_Code, Gender, Date_Of_birth, Email, Aadhar_number, Designation, Salary, IFSC_Code) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
    	'), array($name[0], $middle_name, $name[count($name) - 1], $user['street'], $user['city'], $user['state'], $user['pin'], $user['gender'], $user['dob'], $user['email'], $user['aadhar_no'], $user['designation'], $salary, $ifsc_code));
        // end inserting into the employees table

    	// update the accounts table
    	$account_number = Customer::generate_account();
    	$account = new Account;
    	$account -> insert_into_account($account_number, $user);

    	// insert into emp phones
    	$employee_id = DB::select("
			SELECT Employee_id FROM employees WHERE Aadhar_Number = ?
    	", array($user['aadhar_no']));
        Emp_Phone::insert_phone($employee_id[0]->Employee_id, $user['phone']);

        // insert into emp_acc
        Emp_Acc::insert_into($account_number, $employee_id[0]->Employee_id);
    }
}
