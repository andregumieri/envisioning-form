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
	adiciona("firstname");
	adiciona("lastname");
	adiciona("email");
	adiciona("country");
	adiciona("state");
	adiciona("city");
	adiciona("purpose");
	adicionaTags("passions");
	adicionaTags("learn");
	adicionaTags("teach");
	adicionaTags("related");
	adiciona("you");
	adiciona("linkstwitter");
	adiciona("linkslinkedin");
	adiciona("linksfacebook");
	adiciona("linksurl");


	/**********************************/
	/** PARE DE MEXER A PARTIR DAQUI **/
	/**********************************/



	/**
	 * Normaliza os links
	 */
	$DB_CAMPOS_CADASTROS['linkstwitter'] = preg_replace("/(http[s]?:\/\/)?(www\.)?twitter.com\//i", "", $DB_CAMPOS_CADASTROS['linkstwitter']);
	$DB_CAMPOS_CADASTROS['linkslinkedin'] = preg_replace("/(http[s]?:\/\/)?([A-z]*\.)?linkedin.com\/(in\/)?/i", "", $DB_CAMPOS_CADASTROS['linkslinkedin']);
	$DB_CAMPOS_CADASTROS['linksfacebook'] = preg_replace("/(http[s]?:\/\/)?([A-z]*\.)?facebook.com(\.[A-z]*)?\//i", "", $DB_CAMPOS_CADASTROS['linksfacebook']);
	$DB_CAMPOS_CADASTROS['linksurl'] = preg_replace("/http[s]?:\/\//i", "", $DB_CAMPOS_CADASTROS['linksurl']);


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