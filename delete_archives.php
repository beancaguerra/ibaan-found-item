<?php
$id = $_GET['id'];

include 'connect_db.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql="DELETE from tb_deletemsg where dmid=$id";
     if($conn->query($sql)===TRUE)
    {
     echo "Record deleted successfully";
     header('Location: admin_verified.php');
    }
     else
    {
     echo "error deleting record:".$conn->error;
    }
     $conn->close();
?>