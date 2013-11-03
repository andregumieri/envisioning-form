<?php
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


	/**
	 * Insere no Banco de dados
	 */
	insere($campos);
?>