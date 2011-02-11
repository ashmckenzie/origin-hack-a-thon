<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';

class FakeUrls extends CustomMongo {

	var	$db = 'faker';
	var $collection = 'urls';

	function __construct() {
		parent::__construct();
	}

	function get_random_url() {
		$urls = $this->find();
		$urls->skip(rand(1, $urls->count()));
		$url = $urls->getNext();
		return $url['path'];
	}
}
