<?php


require_once dirname(__FILE__) . '/../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../lib/SearchTerm.php';

//print_r($_SERVER);

$data = array(
  'query' => $_POST['query']
);

$st = new SearchTerm;
$st->register_search($data);

header('HTTP/1.0 200 OK');

