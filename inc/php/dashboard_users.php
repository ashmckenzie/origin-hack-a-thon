<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/Session.php';

$s = new Session;
$sessions = $s->find()->sort(array('updated_at' => -1));

foreach ($sessions as $session) {
	krumo($session);
}

?>
