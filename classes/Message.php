<?php

class Message {
	
	/**
	 * Function generator for validation messages  from $_SESSION
	 *
	 * @return Generator object
	 */
	public static function errors() {

		if (isset($_SESSION['errors'])) {

			foreach ($_SESSION['errors'] as $key => $value) {
				
				yield $errors[$key] = $value;
			}
		}
	}

	/**
	 * Function generator for system messages from $_SESSION
	 *
	 * @return Generator object
	 */
	public static function messages() {

		if (isset($_SESSION['messages'])) {

			foreach ($_SESSION['messages'] as $key => $value) {
				
				yield $messages[$key] = $value;
			}
		}
	}

	/**
	 * Function to set messages into $_SESSION
	 *
	 * @param  mixed  $message
	 * @param  string  $type
	 * 
	 * @return void
	 */
	public static function set($message, $type) {

		if (is_array($message)) {

			foreach ($message as $key => $value) {
				
				$_SESSION[$type][$key] = $value;
			}
		} else {

			$_SESSION[$type]['message'] = $message;
		}

	}

	/**
	 * Function to reset system messages
	 *
	 * @return void
	 */
	public static function flash() {

		$_SESSION['messages'] = array();
	}
}