<?php
	require("../config.php");
	$usuario = $_POST['username'];
	$senha = $_POST['password'];

	if($usuario!=ADMIN_USER || $senha!=ADMIN_PASS) {
		header("location: index.php?e=1");	
	} else {
		session_start();
		$_SESSION['ef_admin_login'] = true;
		header("location: list.php");
	}
?>