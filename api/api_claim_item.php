<?php
 header("Access-Control-Allow-Origin: *");
  session_start();
    include '../connect_db.php';
    $qrCode = $_POST['qrCode'];
    $xmsg= $conn->query("SELECT t2.*,t1.finder,t1.contact,t1.date,t1.time FROM tb_verifiedmsg t2 INNER JOIN tb_itemrecord t1 ON t2.archItemNumber = t1.itemNo WHERE md5(architemnumber) = '$qrCode'");
    if($xmsg->num_rows > 0){
        $rows = array();
        $xcount = 0;
        while($message= $xmsg->fetch_assoc()){
        $xcount++;
            // $rows['count'][] = $xcount;
            // $rows['textmessage'][] = $message['textmessage'];
            $rows[] = $message;
        }

        echo json_encode($rows);
    }
    else{
        echo json_encode("0");
    }
?>