<?php

require_once './lib/CustomMongo.php';

class RegisterSearchTerm extends CustomMongo {

	var $collection = 'search_terms';

	function __construct() {
		parent::__construct();
	}
}
