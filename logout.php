<?php
	session_start();
	session_destroy();
		unset($_SESSION['adminLogin']);
		header("Location: index.php");
		exit();
?>