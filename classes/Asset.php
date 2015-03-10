<?php

class Asset {

	/**
	 * Function output script files
	 *
	 * @param  array string  $js
	 * 
	 * @return string
	 */

	static public function scripts($js = null) {

		// default values
		$output = '<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
					<script type="text/javascript" src="\business_listing\public\js\app.js"></script>';

		if ($js) {

			foreach ($js as $value) {

				$output .= '<script type="text/javascript" src="\business_listing\public\js\\'.$value.'.js"></script>';
			}
		}

		return $output;
	}

	/**
	 * Function to output style files
	 *
	 * @param  array string  $css
	 * 
	 * @return string
	 */

	static public function styles($css = null) {

		// default values
		$output = '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.min.css">
					<link rel="stylesheet" type="text/css" href="\business_listing\public\css\styles.css">';

		if ($css) {

			foreach ($css as $value) {

				$output .= '<link rel="stylesheet" type="text/css" href="\business_listing\public\css\\'.$value.'.css">';
			}
		}

		return $output;
	}

}