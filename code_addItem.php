<?php

include('libs/phpqrcode/qrlib.php'); 

    ini_set('display_errors',1);
    //error_reporting(E_ALL & ~E_NOTICE);
    Error_reporting(0);

    include 'connect_db.php';
    

    //GENERATE ItemNo
    $result = $conn->query("SELECT MAX(itemNo)+1 AS max_itemNo FROM tb_itemrecord");
    $row =$result->fetch_array();
    $ItemNo =  $row["max_itemNo"];

    $Finder         =   $_POST['finder'];
    $Contact        =   $_POST['contact'];
    $ItemNo1         =   $_POST['itemNo'];
    $Time           =  $_POST['time'];
    $Date           =   $_POST['date'];
    $ItemCategory   =   $_POST['itemCategory'];
    $ItemLoc        =  str_replace("'","''",$_POST['itemLocation']);
    $Description    =   str_replace("'","''",$_POST['itemDescription']);
    $itemBrand    =   str_replace("'","''",$_POST['itemBrand']);
    $itemColor    =   str_replace("'","''",$_POST['itemColor']);

    // $ItemLoc        =  $_POST['itemLocation'];
    // $Description    =   $_POST['itemDescription'] ;
    // $itemBrand    =   $_POST['itemBrand'];
    // $itemColor    =  $_POST['itemColor'];
  


    //insert data to tb_itemRecord table
    $sql = "INSERT INTO tb_itemrecord(finder, contact, itemNo, time, date, itemCategory, itemLocation, itemDescription,itemColor,itemBrand) VALUES('$Finder','$Contact','$ItemNo','$Time','$Date', '$ItemCategory','$ItemLoc','$Description','$itemColor','$itemBrand')";

    if ($conn->query($sql) === TRUE) { 
        echo "<script>alter('$sql')</script>";
        echo "New record created successfully";
      } else { 
        echo "<script>alter('$sql')</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
       
    header("location: admin_itemRecord.php");
    exit;


?>