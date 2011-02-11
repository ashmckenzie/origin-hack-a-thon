<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <title>Wassup! Search Form</title>

  <!-- Meta Tags -->
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="robots" content="index, follow" />

  <!-- CSS -->
  <link rel="stylesheet" href="/css/application.css" media="screen,projection" type="text/css" />

  <!-- RSS -->
  <!-- <link rel="alternate" href="" title="RSS Feed" type="application/rss+xml" /> -->

  <!-- JavaScript : Include and embedded version -->
  <script src="/js/jquery-1.5.min.js" type="text/javascript"></script>

  </head>

<body>


  <div id="container">
    <?php include('./inc/php/header.php'); ?>
    <div id="content">
      Wassup!<sup>tm</sup> - Show Hits
      <br />
<?php

require_once dirname(__FILE__) . '/lib/krumo/class.krumo.php';
require_once dirname(__FILE__) . '/lib/Hit.php';

$h = new Hit;
$hits = $h->find()->sort(array('created_at' => -1));

foreach ($hits as $hit) {
  krumo($hit);
}
?>
    </div>
    <div id="debug">

    </div>
  </div><!-- container -->

</body>
</html>
