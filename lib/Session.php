<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';

class Session extends CustomMongo {

	var $collection = 'sessions';

	function __construct() {
		parent::__construct();
	}

	function register_session($session_id, &$data) {
		$data = array(
			'session_id' => $session_id,
			'browser' => $this->get_browser()
		);

		$this->insert($data);

		return $this->find_one($data);
	}

	function $this->get_browser() {
		return '';
	}

	function $this->get_name() {
	}
}
