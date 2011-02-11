<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';

class SearchTerm extends CustomMongo {

	var $db = 'hack';
	var $collection = 'search_terms';

	function __construct() {
		parent::__construct();
	}


  function register_search($data) {

    if (! is_null($data['query'])) {
      return $this->insert($data);
    } else {
      return false;
    }
  }

}
