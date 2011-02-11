<?php

require_once('lib/FakeUrls.php');


  function get_url() {
    $fu = new FakeUrls;
    return $fu->get_random_url();
  }

$page_name = get_url();


?>

<div id="header">
<a href="/">Home</a> | <a href="/search.php">Search</a> | <a href="/dashboard.php">Dashboard</a> | <a href="/url/<?php echo $page_name; ?>">Phony Page Hit (randomised)</a>
</div>
