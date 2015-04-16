<?php

class Url {

	static public function append($field, $value) {

		$url = $_SERVER['PHP_SELF'].'?';

		if (count($_GET) > 0) {

			foreach ($_GET as $key => $val) {

				if ($key != $field) {

					if ($key == 'page') {

						$url .= $key.'=1&';
					
					} else {

						$url .= $key.'='.$val.'&';
					}

				}
				
			}

		}

		return $url.$field.'='.$value;
	}

	static public function reset() {

		return $_SERVER['PHP_SELF'];
	}

	static public function is_active($base) {

		if (basename($_SERVER['PHP_SELF']) == $base) {

			return ' active ';
		
		} else {

			return '';
		}
	}

	static public function paymentApi($_api_key, $_token, $_amount, $_card_number, $_cvv) {

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
}