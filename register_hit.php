<?php

require_once './lib/krumo/class.krumo.php';
require_once './lib/RegisterHit.php';

krumo($_SERVER);

$data = array(
	'url' => '/test'
);

$r = new RegisterHit;
//$r->register_hit($data);

$hits = $r->find();

foreach ($hits as $hit) {
	krumo($hit);
}
