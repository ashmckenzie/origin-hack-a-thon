<h3>Recent Search Terms</h3>
<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/SearchTerm.php';

define('QUERY_MAX_AGE', 180);		// mins
define('QUERY_LIMIT', 10);

$offset = QUERY_MAX_AGE * 60;
$start = new MongoDate(time() - $offset);

$conditions = array(
	'created_at' => array('$gt' => $start)
);

$st = new SearchTerm;
$search_terms = $st->find($conditions)
              ->sort(array('created_at' => -1))
              ->limit(QUERY_LIMIT);


print "<ol>";

$i = 0;

foreach ($search_terms as $search_term) {
  $i++;
	print "<li>" . $search_term['query'] . "</li>";
}

print "</ol>";

?>
