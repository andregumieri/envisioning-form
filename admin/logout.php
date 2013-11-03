<?php
	session_start();
	unset($_SESSION['ef_admin_login']);
	header("location: index.php");
?>