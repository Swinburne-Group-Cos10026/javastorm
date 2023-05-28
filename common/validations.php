<?php
function date_validation($date) {
	$date_format = "d/m/Y";

	$date_obj = DateTime::createFromFormat($date_format, $date); //check whether input date is in correct format
	if ($date_obj === false) {
		return false; // Invalid date format
	}

	// Check if the date is valid
	$day = $date_obj->format('d');
	$month = $date_obj->format('m');
	$year = $date_obj->format('Y');
	if (!checkdate($month, $day, $year)|| $date_obj->format($date_format) !== $date) {
		return false; // Invalid date
	}

	return true;
}

function age_validation($date) {
	$date_format = "d/m/Y";
	$min_age = 15;
	$max_age = 80;

	$date_obj = DateTime::createFromFormat($date_format, $date);
	
	if ($date_obj === false) {
		// Invalid date format
		return false;
	}

	// Calculate the age
	$today = new DateTime();
	
	if ($today > $date_obj) {
		$diff = $today->diff($date_obj);
		$age = $diff->y; // Retrieve the number of years
	
		return $age >= $min_age && $age <= $max_age;
	}
	
	// Future date provided
	return false;
}

$postcode_mapping = [
	"VIC"=> "/^3/",
	"NSW"=> "/^1|2/",
	"QLD"=> "/^4|9/",
	"NT"=> "/^08/",
	"WA"=> "/^6/",
	"SA"=> "/^5/",
	"TAS"=> "/^7/",
	"ACT"=> "/^0/"
];


function postcode_states_matching($postcode, $state) {
	return preg_match($GLOBALS["postcode_mapping"][$state], $postcode);
}

function format_missing_error($field) {
	return sprintf("<p><strong>Please fill in the %s </strong></p>", $field);
}

function format_invalid_error($field, $extra_message) {
	return sprintf("<p><strong>Invalid Field Provided: %s </strong> %s</p>", $field, $extra_message);
}
