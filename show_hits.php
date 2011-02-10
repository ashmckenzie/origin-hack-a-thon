<?php

require_once dirname(__FILE__) . '/lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/lib/Hit.php';

$h = new Hit;
$hits = $h->find()->sort(array('created_at' => -1));

foreach ($hits as $hit) {
	krumo($hit);
}
