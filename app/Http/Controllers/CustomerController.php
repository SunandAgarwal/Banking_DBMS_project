<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    // to give the name
    public function index() {
    	// $name = Customer::getName();
    	return view('index');
    }
}
