<?php

@session_start();

require_once dirname(__FILE__) . '/../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../lib/Hit.php';

//print_r($_SERVER);

$data = array(
	'url' => $_POST['url'],
	'referer' => $_SERVER['HTTP_REFERER']
);

$h = new Hit;
$h->register_hit(session_id(), $data);

header('HTTP/1.0 200 OK');
