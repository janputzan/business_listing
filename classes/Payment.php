<?php

class Payment extends Model{

	public function __construct() {

		parent::__construct();
	}

	/**
	 * Save payment to database
	 *
	 * @param  array  $input
	 * 
	 * @return boolean
	 */

	public function save($input) {

		extract($input);

		$sql = "INSERT INTO $this->table (business_id, amount) VALUES ('$business_id', '$amount')";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}
}