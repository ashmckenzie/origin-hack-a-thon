<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';

class SearchTerm extends CustomMongo {

	var $collection = 'search_terms';

	function __construct() {
		parent::__construct();
	}
}
