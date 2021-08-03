<?php

$dbname = 'school';
$dbuser = 'root';
$dbpass = 'mambo';
$dbhost = 'localhost';

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
?>