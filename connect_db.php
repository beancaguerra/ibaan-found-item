<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL & ~E_NOTICE);
//Error_reporting(0);
//Make a MySQL Connection
//server
//echo" Connected to database ";
//$dbServername = "localhost";
//$dbUsername = "root";
//$dbPassword = "";
//$dbname = "ibaanrecord_db";

//$conn = mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbname);

<?php
    
include 'config.php';

if($environment == "prod"){

    $dbname = "u538504999_ibaanrecord_db";
    // Create connection
    //("htp.ibaanfounditem.online", "", "", $dbname)
    $conn = mysqli_connect("htp.ibaanfounditem.online", "u538504999_ibaanrecord", "Qwert@bbdSKL08",$dbname);
}
else{

$dbname = "ibaanrecord_db";
// Create connection
$conn = mysqli_connect("localhost", "root", "",$dbname);

}


// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>

?>