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

	function insert(&$data = false, $args = array()) {
		if (! $data) {
			return false;
		}
		$collection = $this->collection;
		$c = $this->db->$collection;

		$data['created_at'] = time();

		return $c->insert($data, $args);
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
