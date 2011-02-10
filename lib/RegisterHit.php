<?php

require_once './lib/CustomMongo.php';

class RegisterHit extends CustomMongo {

	var $collection = 'hits';

	function __construct() {
		parent::__construct();
	}

	function register_hit($data) {
		$this->insert($data);
	}
}
