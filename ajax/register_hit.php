<?php

@session_start();

require_once dirname(__FILE__) . '/../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../lib/Session.php';
require_once dirname(__FILE__) . '/../lib/Hit.php';

krumo($_SERVER);

$data = array(
	'url' => $_POST['url'],
	'refer' => $_SERVER['HTTP_REFERER']
);

$h = new Hit;
$h->register_hit(session_id(), $data);

$hits = $h->find();

foreach ($hits as $hit) {
	krumo($hit);
}
