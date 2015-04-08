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
}