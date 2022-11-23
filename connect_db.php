<?php

ini_set('display_errors', 1);
//error_reporting(E_ALL & ~E_NOTICE);
Error_reporting(0);
//Make a MySQL Connection
//server
//echo" Connected to database ";
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "db_ibaanrecord";

$conn = mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbname);

?>