<?php

/*
#
# 	The Luhn Formula:
#	Drop the last digit from the number. The last digit is what we want to check against
#	Reverse the numbers
#	Multiply the digits in odd positions (1, 3, 5, etc.) by 2 and subtract 9 to all any result higher than 9
#	Add all the numbers together
#	The check digit (the last number of the card) is the amount that you would need to add to get a multiple of 10 (Modulo 10)
#
#
#	@source  FreeFormatter.com (http://www.freeformatter.com/credit-card-number-generator-validator.html)
#
#
*/

/**
*	Function to validate a card number using The Luhn Formula
*
*	@param string $cardNumber
*
*	@return int
*			200 Invalid Length
*			300 Validation Failed
*			400 Validation Passed
*/

 function validate($card_number) {

	// Validate card number length
	if (strlen($card_number) != 16) {

		return 200;
	}

	// Drop the last digit from the number. The last digit is what we want to check against
	$check = intval(substr($card_number, 15, 1));


	// Reverse the numbers
	$rest = strrev(substr($card_number, 0, 15));

	$restList = array();

	// Multiply the digits in odd positions (1, 3, 5, etc.) by 2 and subtract 9 to all any result higher than 9
	for ($i = 0, $_len = strlen($rest); $i < $_len; $i++) {

		$num = intval(substr($rest, $i, 1));

		if ($i%2 == 0) {

			array_push($restList, (2 * $num) > 9 ? (2 * $num) - 9 : (2 * $num));
		
		} else {

			array_push($restList, $num);
		}
	}

	// The check digit (the last number of the card) is the amount that you would need to add to get a multiple of 10 (Modulo 10)
	if ((array_sum($restList) + $check)%10 == 0) {

		return 400;
	}

	return 300;
}

// Get request parameters
$api_key = isset($_GET['api_key']) ? $_GET['api_key'] : null;

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

$card_number = isset($_GET['card_number']) ? $_GET['card_number'] : null;

$cvv = isset($_GET['cvv']) ? $_GET['cvv'] : null;

$amount = isset($_GET['amount']) ? $_GET['amount'] : null;

// hardcoded api_key to validate against the request
$_API = 's0m3h4rdc0d3dv41u3';

// sending json response
header('Content-Type: application/json');

if ($api_key != $_API) {

	echo json_encode(array('status' => 'fail',
		'message' => 'Wrong api key'));

	return false;
}

// process payment - checking if the card number and cvv pass validation
if ($card_number && $cvv && $order_id && $amount) {

	// this is only a simulation - not valid authentication method
	if ($cvv != substr($card_number, 13, 3)) {

		echo json_encode(array('status' => 'fail',
					'message' => 'Invalid CVV'));

		return false;
	}

	// validate card number
	switch (validate($card_number)) {

		case 200:
			echo json_encode(array('status' => 'fail',
						'message' => 'Invalid length'));
			break;

		case 300:
			echo json_encode(array('status' => 'fail',
					'message' => 'Card failed validation'));
			break;

		case 400:
			echo json_encode(array('status' => 'success',
				'message' => 'Payment processed',
				'order_id' => $order_id,
				'amount' => $amount));
			break;

		default:
			echo json_encode(array('status' => 'fail',
				'message' => 'Error in processing payment'));
			break;
	}

	return false;

} else {

	echo json_encode(array('status' => 'fail',
				'message' => 'Incomplete details'));
}


return false;

?>
