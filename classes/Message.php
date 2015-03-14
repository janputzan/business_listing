<?php

class Message {
	
	public static function errors() {

		if (isset($_SESSION['errors'])) {

			foreach ($_SESSION['errors'] as $key => $value) {
				
				yield $errors[$key] = $value;
			}
		}
	}

	public static function messages() {

		if (isset($_SESSION['messages'])) {

			foreach ($_SESSION['messages'] as $key => $value) {
				
				yield $messages[$key] = $value;
			}
		}
	}

	public static function set($message, $type) {

		if (is_array($message)) {

			foreach ($message as $key => $value) {
				
				$_SESSION[$type][$key] = $value;
			}
		} else {

			$_SESSION[$type]['message'] = $message;
		}

		return false;
	}

	public static function flash() {

		// $_SESSION['errors'] = array();
		$_SESSION['messages'] = array();
	}
}