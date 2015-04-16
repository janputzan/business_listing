<?php

	require('../App.php');
	App::start();

	if (!isset($_SESSION['wizard'])) {

		Message::set('You are not authorized', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");

		return false;
	}

	$api_key = 's0m3h4rdc0d3dv41u3';

	$length = 10;
	$token = substr(str_shuffle(md5(time())), 0, $length);

	switch ($_SESSION['wizard.package']) {

		case 'standard':
			$amount = 10;
			break;
		case 'premium':
			$amount = 50;
			break;
		default:
			$amoun = 10;
			break;
	}

	$card_number = $_POST['card_number'];

	$cvv = $_POST['cvv'];

	if (!Validation::cardDetails(array('card_number' => $card_number, 'cvv' => $cvv))) {

		Message::set('Please correct all errors.', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");

		return false;
	}

	$response = json_decode(file_get_contents(Url::paymentApi($api_key, $token, $amount, $card_number, $cvv)));

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

			if ($paymentModel->save(array('business_id' => $_SESSION['wizard.business_id'], 'amount' => $amount))) {

				Message::set('Payment Processed', 'messages');

				$url = '../pages/businessPage.php?business_id=' . $_SESSION['wizard.business_id'];

				header("Location: " . $url);
				unset($_SESSION['wizard']);
				unset($_SESSION['wizard.user_id']);
				unset($_SESSION['wizard.package']);
				
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