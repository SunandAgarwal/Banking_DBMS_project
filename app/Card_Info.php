<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Card_Info extends Model
{
	//to generate a random card number.
	public static function generate_card_no() {
		$card_no = rand(10000000000,99999999999);
	        // avoid duplicate entries of Card number
	        while(true) {
	            $card = DB::select("SELECT Card_No FROM card__info WHERE Card_No = ?" , array($card_no));
	            if($card == NULL ) break;
	            else if ($card[0] -> Card_No == $card_no)
	            $card_no++;
	        }
        	return $card_no;
	}

	//to check if the user already has a card.
	public static function check_card($account_number) {
		$check = DB::select("
			SELECT Card_No, Status FROM card__info WHERE Account_Number = $account_number
			AND Status = 'Active'
		");
		if($check == NULL)
			return 0;
		else
		{
			return 1;
		}
	}

    //to generate card.
    public static function generate_card($account_number, $card_details) {
		$card_no = Card_Info::generate_card_no();
    	$cvv = rand(100,999);
    	$month = DB::select("Select MONTH(CURDATE()) as month");
    	$year = DB::select("Select YEAR(CURDATE()) as year");
    	$month = $month[0]->month;
    	$year = $year[0]->year;
    	$year += 5;
    	$valid_thru = $month."/".$year;
		DB::insert("
			INSERT INTO card__info VALUES (?,?,?,?,?,?,?,'Active')
		", array($card_no, $cvv, $valid_thru, Auth::user()->name, $card_details['type'], bcrypt($card_details['pin']), $account_number));
    }

    //to show the card information.
    public static function show_card_info($account_number) {
    	$card_info = DB::select("
			SELECT Card_No, Valid_Thru, CVV, Card_Holder, Type, Account_Number, Status
		    FROM card__info WHERE Account_Number = $account_number AND Status = 'Active'
    	");
    	if($card_info != NULL)
    		$card_info = $card_info[0];
    	return $card_info;
    }

    //to block a card.
    public static function block_card($block_details) {
    	DB::update("
			UPDATE card__info SET Status = 'Blocked' WHERE Account_Number = ?
    	", array($block_details['account_number']));
    }
}
