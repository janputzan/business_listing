<?php

class App {

	/**
	 * Function that is to execute on every page
	 * - autoloads classes
	 * - sets error reporting
	 * - starts session
	 * @return void
	 */
	static public function start() {
		// workaround for mayar server's PHP version is older than 5.6
		if ('127.0.0.1' == $_SERVER["REMOTE_ADDR"]) {

			spl_autoload_register(function ($class) {
	    		include '/classes/' . $class . '.php';
			});

		} else {

			define('BASE_PATH', realpath(dirname(__FILE__)));

			spl_autoload_register(function ($class) {
	    		include BASE_PATH . '/classes/' . $class . '.php';
			});

			ini_set("display_errors", 1);
			error_reporting(E_ALL);
			
		}

		// start session
		session_start();
	}

	/**
	 * Function to check if the envirnment is local
	 *
	 * @return boolean
	 */
	static public function isLocal() {

		if ('127.0.0.1' == $_SERVER["REMOTE_ADDR"]) {
			
			return true;
		
		} else {
			
			return false;
		}
	}
	
	
}