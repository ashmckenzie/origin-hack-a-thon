<?php

function randomString($length = 10, $chars = '1234567890') {
    $randomString = '';


    // Alpha lowercase
    if ($chars == 'alphalower') {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
    }

    // Numeric
    if ($chars == 'numeric') {
        $chars = '1234567890';
    }

    // Alpha Numeric
    if ($chars == 'alphanumeric') {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    }

    // Hex
    if ($chars == 'hex') {
        $chars = 'ABCDEF1234567890';
    }

    $charLength = strlen($chars)-1;

    for($i = 0 ; $i < $length ; $i++)
        {
            $randomString .= $chars[mt_rand(0,$charLength)];
        }

    return $randomString;
}

$page_name = randomString(8,'alphalower');


?>

<div id="header">
<a href="/">Home</a> | <a href="/search.php">Search</a> | <a href="/dashboard.php">Dashboard</a> | <a href="/url/<?php echo $page_name; ?>.php">Phony Page Hit (randomised)</a>
</div>
