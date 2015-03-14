<?php

class Message {
	
	/**
	 * Function for returning validation messages  from $_SESSION
	 *
	 * @return Generator object
	 */
	public static function errors() {

		$errors = array();

		if (isset($_SESSION['errors'])) {

			foreach ($_SESSION['errors'] as $key => $value) {
				
				$errors[$key] = $value;
			}
		}

		return $errors;
	}

	/**
	 * Function for returning system messages from $_SESSION
	 *
	 * @return Generator object
	 */
	public static function messages() {

		$messages = array();

		if (isset($_SESSION['messages'])) {

			foreach ($_SESSION['messages'] as $key => $value) {
				
				$messages[$key] = $value;
			}
		}

		return $messages;
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