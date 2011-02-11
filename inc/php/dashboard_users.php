<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/Session.php';

define('DASHBOARD_USER_SESSION_MAX_AGE', 5);		// mins
define('DASHBOARD_USER_LIMIT', 30);

$offset = DASHBOARD_USER_SESSION_MAX_AGE * 60;

$s = new Session;

$start = new MongoDate(time() - $offset);

$conditions = array(
	'updated_at' => array('$gt' => $start)
);

$sessions = $s->find($conditions)->sort(array('updated_at' => -1))->limit(DASHBOARD_USER_LIMIT);

foreach ($sessions as $session) {
	krumo($session);
}

?>