<?php


?>



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
<?php include('./inc/html/header.html'); ?>
  Welcome to Wassup! Search <sup>tm</sup>

  <form name="form_query" method="get" action="/search.php">
    <label for="query" id="searchLabel">Search:</label>
    <input size="20" maxlength="50" name="query" id="query" value="" type="text">
    <input type="submit">
  </form>

  </div><!-- container -->

</body>
</html>
