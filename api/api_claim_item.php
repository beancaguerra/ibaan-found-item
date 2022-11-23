<?php
  session_start();
    include '../connect_db.php';
    $qrCode = $_POST['qrCode'];
    $xmsg= $conn->query("SELECT * FROM tb_verifiedmsg WHERE md5(architemnumber) = '$qrCode'");
    if($xmsg->num_rows > 0){
       

        echo json_encode("1");
    }
    else{
        echo json_encode("0");
    }
?>