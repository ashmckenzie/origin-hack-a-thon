<?php

require_once dirname(__FILE__) . '/../lib/CustomMongo.php';
require_once dirname(__FILE__) . '/../lib/FakeUser.php';

class Session extends CustomMongo {

	var $db = 'hack';
	var $collection = 'sessions';

	function __construct() {
		parent::__construct();
	}

	function register_session($session_id, &$data) {

		$browser = get_browser(null, true);

		$data = array(
			'session_id' => $session_id,
			'platform' => $browser['platform'],
			'browser_type' => $browser['browser'],
			'browser_version' => $browser['version'],
			'name' => $this->get_name()
		);

		$this->insert($data);

		return $this->find_one($data);
	}

	function update_session($session_id, $data = array()) {
		return $this->update(array('session_id' => $session_id), $data);	
	}

	function get_name() {
		$fu = new FakeUser;
		return $fu->get_random_name();
	}
}
