<?php
	session_start();
	if(!isset($_SESSION['ef_admin_login'])) {
		die("error");
	}

	$id = $_POST['id'];
	require('../../config.php');
	require('../../inc/database.php');


	mysqli_query($DB, "DELETE FROM `cadastros` WHERE `id`={$id}");
	mysqli_query($DB, "DELETE FROM `cadastros_tags` WHERE `cadastro_id`={$id}");
	die("ok");
?>