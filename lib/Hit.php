<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';
require_once dirname(__FILE__) . '/../lib/Session.php';

class Hit extends CustomMongo {

	var $collection = 'hits';

	function __construct() {
		parent::__construct();
	}

	function register_hit($session_id, $data) {
		$session = $this->_get_session($session_id);
		$data['session_id'] = $session['_id'];
		$this->insert($data);
	}

	private function _get_session($session_id) {

		$s = new Session;

		if (! ($session = $s->find_one(array('session_id' => $session_id)))) {
			$session = $s->register_session($session_id, $data);
		}

		return $session;
	}
}
