<?php

require_once dirname(__FILE__) . '/../../lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/../../lib/Session.php';

define('DASHBOARD_USER_SESSION_MAX_AGE', 30);		// mins
define('DASHBOARD_USER_LIMIT', 15);

$offset = DASHBOARD_USER_SESSION_MAX_AGE * 60;

$s = new Session;

$start = new MongoDate(time() - $offset);

$conditions = array(
	'updated_at' => array('$gt' => $start)
);

$sessions = $s->find($conditions)
							->sort(
									array(
										'hits' => -1,
										'updated_at' => -1
									)
								)
							->limit(DASHBOARD_USER_LIMIT);

$now = strftime('%d/%m/%YTY %H:%M:%S');

print "<table>
<thead>
	<tr>
		<th></th>
		<th>Nick</th>
		<th>Age</th>
		<th>Updated</th>
		<th>Hits</th>
	</tr>
</thead>
<tbody>";


foreach ($sessions as $session) {

	//krumo($session);

	$session_duration = ago($session['created_at']->sec);
	$session_updated = ago($session['updated_at']->sec);

	print "<tr>";
	print '<td><div class="browser ' . strtolower($session['browser_type']) . '">&nbsp;</div></td>';
	print '<td><span class="name">' . $session['name'] . '</span></td>';
	print '<td><span class="duration">' . $session_duration . '</span></td>';
	print '<td><span class="updated">' . $session_updated . '</span></td>';
	print '<td><span class="hits">' . $session['hits'] . '</span></td>';
	print "</tr>";
}

print "
</tbody>
</table>";

print "<p class=\"center\" style=\"font-size: 10px; color: #777;\">Last updated: $now</p>";

function ago($tm, $rcs = 0) {
	$cur_tm = time(); $dif = $cur_tm-$tm;
	$pds = array('second','minute','hour','day','week','month','year','decade');
	$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
	$no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	return $x;
}

?>
