<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Customer;
use App\Employee;

class RegistrationController extends Controller
{

    public function create()
    {
    	return view('register');
    }

    public function store()
    {
    	$user = request('user');

    	if($user == "customer")
    	{
    		$user = new Customer;
    		$user -> insert_data_customers(request()->all());
    	}
    	else
    	{
    		$user = new Employee;
    		$user -> insert(request()->all());
    	}


    }
}
