<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'SessionsController@homepage');

Route::get('/home', 'CustomerController@index') -> name('home');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/accountServices', 'AccountController@services');

Route::get('/accountSummary', 'AccountController@summary');

Route::get('/deposit', 'TransactionController@deposit_show');

Route::post('/home', 'TransactionController@deposit');

Route::get('/accountStatement', 'AccountController@statement');

Route::get('/miniStatement', 'AccountController@miniStatement');

Route::get('/specifiedPeriod', 'TransactionController@specified_form');

Route::post('/specifiedPeriod', 'TransactionController@specified_show');

Route::get('/transactionHistory', 'TransactionController@showTransactionHistory');

Route::get('/send', 'TransactionController@send_show');

Route::post('/send', 'TransactionController@send');

Route::get('/loanServices', function() {
	return view('LoanServices.loanShow');
});

Route::get('/issueLoan', 'TakesLoanController@takeForm');

Route::get('/repay', 'LoanController@repay');

Route::post('/repay', 'LoanController@updateMoney');

Route::post('/issueLoan', 'TakesLoanController@issueLoan');

/*
	DELIMITER //
	CREATE TRIGGER updateAmtLoan
	AFTER INSERT ON takes__loan
	FOR EACH ROW
	BEGIN
		UPDATE accounts SET balance = balance + new.Loan_Amount;
	END //
*/
