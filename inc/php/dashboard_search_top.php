<h3>Top Search Terms</h3>

<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/SearchTerm.php';

// TODO rename these
define('QUERY_MAX_AGE', 180);    // mins
define('QUERY_LIMIT', 10);

$offset = QUERY_MAX_AGE * 60;
$start = new MongoDate(time() - $offset);

$conditions = array(
	'created_at' => array('$gt' => $start)
);

// grouping...
$keys = array("query" => 1);
$initial = array("queries" => array());
$reduce = "function (obj, prev) { prev.queries.push(obj.query); }";

$groupConfig = array(
  'keys' => $keys,
  'initial' => $initial,
  'reduce' => $reduce
);


$st = new SearchTerm;
$search_terms = $st->findGrouped($groupConfig, $conditions);

$grouped_results = array();
foreach($search_terms as $search_term)
{
  $query = $search_term['query'];
  $grouped_results["$query"] = count($search_term['queries']);
}

arsort($grouped_results, SORT_NUMERIC);

print("<ol id='dashboard_table_search_top'>");

$i = 0;
foreach ($grouped_results as $query => $count) {
  $i++;
	print("<li>" . $query . " (" . $count . " queries)</li>");
}
print("</ol>");


?>



