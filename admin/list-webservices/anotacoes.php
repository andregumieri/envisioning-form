<?php
	session_start();
	if(!isset($_SESSION['ef_admin_login'])) {
		die("error");
	}

	$id = $_POST['id'];
	$anotacoes = $_POST['anotacoes'];
	require('../../config.php');
	require('../../inc/database.php');


	mysqli_query($DB, "UPDATE `cadastros` set `anotacoes`='{$anotacoes}' WHERE `id`={$id}");
	die("ok");
?>