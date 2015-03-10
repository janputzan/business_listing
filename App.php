<?php

class App {

	/**
	 * Function to autoload classes
	 *
	 */
	static public function start() {
		spl_autoload_register(function ($class) {
    		include substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT'].'\\business_listing')).'\classes\\' . $class . '.php';
		});
	}
	
	
}