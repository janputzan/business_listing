<?php

class Form {
	
	
	/**
	 * Function to create an openning form tag
	 *
	 * @param  string  $url
	 * @param  string  $id
	 * @param  string  $class
	 * 
	 * @return string
	 */
	static public function open($url, $id = null, $class = null) {

		if (!$class) {

			$class = '';
		}

		if (!$id) {

			$id = 'form';
		}

		return '<form id="'.$id.'" action="'.$url.'" method="post" class="'.$class.'">'."\n";
	}

	/**
	 * Function to create an closing form tag
	 *
	 * @return string
	 */
	static public function close() {

		return '</form>';
	}

	/**
	 * Function to create a label tag
	 *
	 * @param  string  $name
	 * @param  string  $text
	 * 
	 * @return string
	 */
	static public function label($name, $text) {

		return '<label for="'.$name.'">'.$text.'</label>'."\n";
	}

	/**
	 * Function to create a label tag
	 *
	 * @param  string  $name
	 * @param  string  $text
	 * 
	 * @return string
	 */
	static public function error($name) {

		$error = isset($_SESSION['errors'][$name]) ? $_SESSION['errors'][$name] : '';


		unset($_SESSION['errors'][$name]);

		return '<span class="error">'.$error.'</span>';
	}

	/**
	 * Function to create an input type text tag
	 *
	 * @param  string  $name
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function text($name, $class = null) {

		if (!$class) {

			$class = 'validate';
		}

		return '<input type="text" id="'.$name.'" class="'.$class.'" name="'.$name.'" value="'.getValue($name).'">'."\n";
	}

	/**
	 * Function to create a textarea tag
	 *
	 * @param  string  $name
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function textarea($name) {

		return '<textarea id="'.$name.'" class="materialize-textarea" name="'.$name.'">'.getValue($name).'</textarea>'."\n";
	}

	/**
	 * Function to create an input type password tag
	 *
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function password($class = null) {

		if (!$class) {

			$class = '';
		}

		return '<input type="password" id="password" class="'.$class.'" name="password">'."\n";
	}

	/**
	 * Function to create an input type submit tag
	 *
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function submit($value = null, $class = null) {

		if (!$value) {

			$value = 'Submit';
		}

		if (!$class) {

			$class = 'btn button';

		} else {

			$class .= ' btn button';
		}

		return '<input type="submit" class="'.$class.'" value="'.$value.'">'."\n";
	}
}


/**
 * Helper Function to get old input value stored in $_SESSION
 *
 * @param  string  $name
 * 
 * @return string
 */
function getValue($name) {

	$value = '';

	if (isset($_SESSION['input-old'][$name])) {

		$value = $_SESSION['input-old'][$name];

		unset($_SESSION['input-old'][$name]);
	}

	return $value;
}