<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Employee;

class RegistrationController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    // create a new user

    public function create() {
    	return view('register');
    }

    // store the information of the user
    public function store() {
    	$user = request('user');
    	if($user == 'customer') {
    		$user = new Customer;
    		// the insert query is in the Customer.php model, which is called by the
    		// insert method
    		if(request('type') == 'Joint') {
    			$user -> insert_into_joint(request() -> all());
    		}
    		else
    			$user -> insert_data_customer(request() -> all());
    	}
    	else {
    		$user = new Employee;
    		$user -> insert_data_employee(request() -> all());
    	}

    	//to insert into users table.
    	//FOR AUTHENTICATION PURPOSE.
    	User::insert_into_user(request()->all());

    	return redirect()->home();
    }
}
