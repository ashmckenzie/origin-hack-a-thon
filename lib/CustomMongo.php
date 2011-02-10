<?php

class CustomMongo {

	var $m = null;
	var $db = 'hack';

	function __construct() {
		$this->m = new Mongo();
		$this->select_db($this->db);
	}

	function select_db($db) {
		$this->db = $this->m->$db;
	}

	function insert($data = false) {
		if (! $data) {
			return false;
		}
		$collection = $this->collection;
		$c = $this->db->$collection;
		return $c->insert($data);
	}

	function find($args = array()) {
		$collection = $this->collection;
		$c = $this->db->$collection;
		return $c->find($args);
	}
}

/*
// connect
$m = new Mongo();

// select a database
$db = $m->comedy;

// select a collection (analogous to a relational database's table)
$collection = $db->cartoons;

// add a record
$obj = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($obj);

// add another record, with a different "shape"
$obj = array( "title" => "XKCD", "online" => true );
$collection->insert($obj);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $obj) {
	echo $obj["title"] . "\n";
}
*/

?>
