<?php

class CustomMongo {

	var $m = null;

	function __construct() {
		$this->m = new Mongo();
		$this->select_db($this->db);
	}

	function select_db($db) {
		$this->db = $this->m->$db;
	}

	function insert(&$data = false, $args = array()) {
		if (! $data) {
			return false;
		}

		$collection = $this->collection;
		$c = $this->db->$collection;

		$now = new MongoDate();

		$data['created_at'] = $now;
		$data['updated_at'] = $now;

		return $c->insert($data, $args);
	}

	function update($query = false, $data = array()) {
	
		$collection = $this->collection;
		$c = $this->db->$collection;

		$now = new MongoDate();
		$data['updated_at'] = $now;

		return $c->update($query, array('$set' => $data));
	}

	function find($args = array()) {
		$collection = $this->collection;
		$c = $this->db->$collection;
		return $c->find($args);
	}

	function find_one($args = array()) {
		$collection = $this->collection;
		$c = $this->db->$collection;
		return $c->findOne($args);
	}
}

?>
