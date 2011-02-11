<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';

class FakeUser extends CustomMongo {

	var	$db = 'faker';
	var $collection = 'users';

	function __construct() {
		parent::__construct();
	}

	function get_random_name() {
		$names = $this->find();
		$names->skip(rand(1, $names->count()));
		$name = $names->getNext();
		return $name['first_name'] . ' ' . $name['last_name'];
	}
}
