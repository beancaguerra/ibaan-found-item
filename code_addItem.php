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
    //$ItemNo         =   $_POST['itemNo'];
    $Time           =   $_POST['time'];
    $Date           =   $_POST['date'];
    $ItemCategory   =   $_POST['itemCategory'];
    $ItemLoc        =  str_replace("'","''",$_POST['itemLocation']);
    $Description    =   str_replace("'","''",$_POST['itemDescription']);
    $itemBrand    =   str_replace("'","''",$_POST['itemBrand']);
    $itemColor    =   str_replace("'","''",$_POST['itemColor']);

    
    //insert data to tb_itemRecord table
    $sql = "INSERT INTO tb_itemrecord(finder, contact, itemNo, time, date, itemCategory, itemLocation, itemDescription,itemBrand, itemColor) VALUES('$Finder','$Contact','$ItemNo','$Time','$Date', '$ItemCategory','$ItemLoc','$Description','$itemBrand','$itemColor')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['Submit']= "New record created successfully";
        header('Location: admin_itemRecord.php');
        exit;
      } else {
        $_SESSION['Submit']= "Failed to add new record!";
        header('Location: admin_itemRecord.php');
        exit;
      }
?>