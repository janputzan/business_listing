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

			$id = '';
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
	 * Function to create an input type text tag
	 *
	 * @param  string  $name
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function text($name, $class = null, $placeholder = null) {

		if (!$class) {

			$class = '';
		}

		if (!$placeholder) {

			$placeholder = '';
		}

		return '<input type="text" id="'.$name.'" class="'.$class.'" name="'.$name.'" placeholder="'.$placeholder.'">'."\n";
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
	static public function textarea($name, $class = null, $placeholder = null) {

		if (!$class) {

			$class = '';
		}

		if (!$placeholder) {

			$placeholder = '';
		}

		return '<textarea id="'.$name.'" class="'.$class.'" name="'.$name.'" placeholder="'.$placeholder.'"></textarea>'."\n";
	}

	/**
	 * Function to create an input type email tag
	 *
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function email($class = null, $placeholder = null) {

		if (!$class) {

			$class = '';
		}

		if (!$placeholder) {

			$placeholder = 'Enter Your Email Here';
		}

		return '<input type="email" id="email" class="'.$class.'" name="email" placeholder="'.$placeholder.'">'."\n";
	}

	/**
	 * Function to create an input type password tag
	 *
	 * @param  string  $class
	 * @param  string  $placeholder
	 * 
	 * @return string
	 */
	static public function password($class = null, $placeholder = null) {

		if (!$class) {

			$class = '';
		}

		if (!$placeholder) {

			$placeholder = 'Enter Your Password Here';
		}

		return '<input type="password" id="password" class="'.$class.'" name="password" placeholder="'.$placeholder.'">'."\n";
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