<?php
  session_start();
    include '../connect_db.php';
    $qrPassword = $_POST['qrPassword'];
    $xmsg= $conn->query("SELECT Concat(fname,' ',lname) as fullName,tb_verifiedmsg.architemnumber as itemNo, tb_itemrecord.itemCategory,tb_itemrecord.itemBrand, tb_itemrecord.itemColor,tb_verifiedmsg.archdescription FROM tb_verifiedmsg INNER JOIN tb_itemrecord ON tb_itemrecord.itemNo = tb_verifiedmsg.architemnumber INNER JOIN tb_residentsacc t2 on t2.accountId=tb_verifiedmsg.archaccountId WHERE verifiedPwd = '$qrPassword' and isClaimed=0");
    if($xmsg->num_rows > 0){
        $rows = array();
        $xcount = 0;
        while($message= $xmsg->fetch_assoc()){
        $xcount++;
            // $rows['count'][] = $xcount;
            // $rows['textmessage'][] = $message['textmessage'];
            $rows[] = $message;
            $ItemNo = $message['itemNo'];
            $Owner =$message['fullName'];
            
            $conn->query("INSERT INTO tb_claimedrecord (clfinder,clcontact,clitemno,cltime,cldate,clitemcategory,clitemlocation,clitemdescription) SELECT finder,contact,itemNo,time,date,itemCategory,itemLocation,itemDescription FROM tb_itemrecord WHERE itemNo = $ItemNo");
            $conn->query("UPDATE tb_verifiedmsg SET isClaimed = 1 WHERE architemnumber = $ItemNo");
            $conn->query("INSERT INTO tb_claimedowner(itemNo, owner, tdclaimed) VALUES('$ItemNo','$Owner',NOW())");
            $conn->query("DELETE FROM tb_itemrecord WHERE itemNo = $ItemNo");
        }

        echo json_encode("1");
    }
    else{
        echo json_encode("0");
    }
?>