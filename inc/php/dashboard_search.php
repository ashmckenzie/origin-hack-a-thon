<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/SearchTerm.php';

define('QUERY_MAX_AGE', 60);		// mins
define('QUERY_LIMIT', 30);

$offset = QUERY_MAX_AGE * 60;

$st = new SearchTerm;

$start = new MongoDate(time() - $offset);

$conditions = array(
	'created_at' => array('$gt' => $start)
);

$search_terms = $st->find($conditions)->sort(array('created_at' => -1))->limit(QUERY_LIMIT);

krumo(count($search_terms));
krumo($search_terms[0]);


foreach ($search_terms as $search_term) {
	krumo($search_term);
}

?>
