<?php

class Url {

	/**
	 * Appends GET parameter to an existing url
	 *
	 * @param  string  $input
	 * @param  mixed  $value
	 * 
	 * @return string
	 */
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

	/**
	 * Removes all GET parameters from a url
	 *
	 * @return string
	 */
	static public function reset() {

		return $_SERVER['PHP_SELF'];
	}

	/**
	 * Checks if the current page matches a given string
	 *
	 * @return string
	 */
	static public function is_active($base) {

		if (basename($_SERVER['PHP_SELF']) == $base) {

			return ' active ';
		
		} else {

			return '';
		}
	}

	/**
	 * Prepares url for calling payment API
	 * @param string $_api_key
	 * @param string $_token
	 * @param string $_amount
	 * @param string $_card_number
	 * @param string $_cvv
	 *
	 * @return string
	 */
	static public function paymentApi($_api_key, $_token, $_amount, $_card_number, $_cvv) {

		if (App::isLocal()) {

			return 'http://localhost/business_listing/aberpay?card_number='
					.$_card_number
					.'&token='.$_token
					.'&amount='.$_amount
					.'&api_key='.$_api_key
					.'&cvv='.$_cvv;
			
		} else {

			
			return 'http://mayar.abertay.ac.uk/~1405776/aberpay?card_number='
					.$_card_number
					.'&token='.$_token
					.'&amount='.$_amount
					.'&api_key='.$_api_key
					.'&cvv='.$_cvv;
		}

	}
}