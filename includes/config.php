<?php
//show all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// database login data (XAMP)
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'fingerscanner';

// connect to the database
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
   echo "connection error";
}

?> 