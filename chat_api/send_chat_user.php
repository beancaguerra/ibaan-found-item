<?php
    header("Access-Control-Allow-Origin: *");

    session_start();
    
    ini_set('display_errors',1);
    //error_reporting(E_ALL & ~E_NOTICE);
    Error_reporting(0);

    include '../connect_db.php';

    $recipient_id = $_POST['recipient_id'];
    $textmessage = $_POST['textmessage'];
    $textmessage = str_replace("'","\'",$textmessage);
    $accountId=$_SESSION['accountId'];
    if ($conn->query("INSERT INTO tbl_user_chats(sender_id,recipient,textmessage,datesent) VALUES($accountId,$recipient_id,'$textmessage',NOW())")=== TRUE)
    {
        echo json_encode(array('count' => 1));
    }
    else{
        echo json_encode(array('count' => 0,
                            'textmessage'=> 'no message'
                                    ));
    }
?>