<?php
	if(!require('config.php')) die("Arquivo de configuração não localizado.");
	require('inc/database.php');
	require('inc/mailchimp-api/MailChimp.class.php');

	$campos = array();


	/**
	 * Valida os campos antes de inserir
	 */
	validarRequerido("firstname", "Please fill First Name field.");
	validarRequerido("lastname", "Please fill Last Name field.");
	validarRequerido("you", "Please tell us about you.");


	/**
	 * Adiciona os campos que serão inseridos no banco de dados
	 */
	$campos[] = adiciona("firstname");
	$campos[] = adiciona("lastname");
	$campos[] = adiciona("email");
	$campos[] = adiciona("country");
	$campos[] = adiciona("state");
	$campos[] = adiciona("city");
	$campos[] = adiciona("purpose");
	$campos[] = adicionaTags("passions");
	$campos[] = adicionaTags("learn");
	$campos[] = adicionaTags("teach");
	$campos[] = adicionaTags("related");
	$campos[] = adiciona("you");
	$campos[] = adiciona("linkstwitter");
	$campos[] = adiciona("linkslinkedin");
	$campos[] = adiciona("linksfacebook");
	$campos[] = adiciona("linksurl");



	/** PARE DE MEXER A PARTIR DAQUI **/


	/**
	 * Insere no Banco de dados
	 */
	$cadastro_id = insere($campos);


	/**
	 * Insere no mailchimp
	 */
	$MailChimp = new MailChimp(MCHIMP_APIKEY);
	$result = $MailChimp->call("lists/subscribe", array(
		'id' => MCHIMP_LISTID,
		'email' => array('email'=>$_POST["email"]),
		'merge_vars' => array('FNAME'=>$_POST['firstname'], 'LNAME'=>$_POST['lastname']),
		'double_optin' => false,
		'update_existing' => false,
		'replace_interests' => false,
		'send_welcome'      => false
	));

	header("location: thankyou.php");
?>