<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/Session.php';

$s = new Session;

$start = new MongoDate(strtotime("2010-01-15 00:00:00"));

$conditions = array(
	'updated_at' => array('$gt' => $start)
);

$sessions = $s->find($conditions)->sort(array('updated_at' => -1));

foreach ($sessions as $session) {
	krumo($session);
}

?>
