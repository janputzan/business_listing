<?php

	require('../App.php');
	App::start();

	function constructUrl($_api_key, $_token, $_amount, $_card_number, $_cvv) {

		if (App::isLocal()) {

			return 'http://localhost/business_listing/payment_gateway/process_payment.php?card_number='
					.$_card_number
					.'&token='.$_token
					.'&amount='.$_amount
					.'&api_key='.$_api_key
					.'&cvv='.$_cvv;
			
		} else {

			
			return 'http://mayar.abertay.ac.uk/~1405776/payment_gateway/process_payment.php?card_number='
					.$_card_number
					.'&token='.$_token
					.'&amount='.$_amount
					.'&api_key='.$_api_key
					.'&cvv='.$_cvv;
		}

	}

	$api_key = 's0m3h4rdc0d3dv41u3';

	$length = 10;
	$token = substr(str_shuffle(md5(time())), 0, $length);

	$amount = 500;

	$card_number = $_POST['card_number'];

	$cvv = $_POST['cvv'];

	if (!Validation::cardDetails(array('card_number' => $card_number, 'cvv' => $cvv))) {

		Message::set('Please correct all errors.', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");

		return false;
	}

	$response = json_decode(file_get_contents(constructUrl($api_key, $token, $amount, $card_number, $cvv)));

	if ($response->token != $token) {

		Message::set('Token mismatch. Please contact the administrator.', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");

		return false;
	}

	switch ($response->status) {

		case 'fail':
			Message::set('Please correct all errors.', 'messages');
			Message::set(array('card_number' => $response->message), 'errors');
			$_SESSION['input-old'] = $input;
			header("Location: {$_SERVER['HTTP_REFERER']}");

		break;

		case 'success':
			$paymentModel = new Payment;

			if ($paymentModel->save(array('business_id' => $_SESSION['wizard.business_id'], 'amount' => 30))) {

				Message::set('Payment Processed', 'messages');

				$url = '../pages/businessPage.php?business_id=' . $_SESSION['wizard.business_id'];

				header("Location: " . $url);
				unset($_SESSION['wizard']);
				unset($_SESSION['wizard.user_id']);
				
			} else {

				Message::set('Something went wrong. Please contact the administrator', 'messages');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		break;

		default:
			Message::set('Something went wrong', 'messages');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		break;
	}

	return false;

?>