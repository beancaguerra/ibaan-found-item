<?php
    include 'connect_db.php';
    //echo" Connected to database ";
    
    $Subject=$_POST['subject'];
    $Caption=$_POST['caption'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date("Y-m-d H:i:s");
    
    //insert data to tb_iteminfo table
    mysql_query("INSERT INTO tb_announcement(subject, caption, timedate) VALUES('$Subject', '$Caption', '$today')");

    header("location: admin_home.php");
    exit;
?>