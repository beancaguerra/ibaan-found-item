<?php

    ini_set('display_errors',1);
    //error_reporting(E_ALL & ~E_NOTICE);
    Error_reporting(0);

    include 'connect_db.php';
    //echo" Connected to database ";
    
    $Id=$_POST['annunceId'];
    $Subject=$_POST['subject'];
    $Caption=$_POST['caption'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date("Y-m-d H:i:s");
    
    //insert data to tb_iteminfo table
    $sql="INSERT INTO tb_announcement(announceId, subject, caption, timedate) VALUES('$Id', $Subject', '$Caption', '$today')";

    header("location: admin_home.php");
    exit;
?>