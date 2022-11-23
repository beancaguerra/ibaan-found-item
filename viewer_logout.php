<?php
	session_start();
	session_destroy();
		unset($_SESSION['user_login']);
		header("Location: user_login_page.php");
		exit();
?>