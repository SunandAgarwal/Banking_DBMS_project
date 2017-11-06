<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    // for login
    public function destroy() {
    	auth()->logout();
    	return redirect()->login();
    }

}
