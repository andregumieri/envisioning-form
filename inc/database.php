<?php
	$DB_CAMPOS_CADASTROS = array();
	$DB_CAMPOS_TAGS = array();

	// CONECTA COM O BANCO DE DADOS
	$DB = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	mysqli_select_db($DB, DB_BASE);

	function validarRequerido($field) {
		if(empty($_POST[$field])) {
			header("location: index.php?empty={$field}");
			die();
		}
	}

	function adiciona($field) {
		global $DB_CAMPOS_CADASTROS;
		$value = $_POST[$field];
		$DB_CAMPOS_CADASTROS[$field] = $value;
	}

	function adicionaTags($field) {
		global $DB_CAMPOS_TAGS;
		$tags = explode(",",strtolower($_POST[$field]));
		$DB_CAMPOS_TAGS[$field] = $tags;
	}

	function listaCadastros($camposTags) {

	}

	function insere() {
		global $DB_CAMPOS_CADASTROS, $DB_CAMPOS_TAGS, $DB;

		// INSERE O CADASTRO
		$sql_fields = '';
		$sql_values = '';
		foreach($DB_CAMPOS_CADASTROS as $field=>$value) {
			$sql_fields .= ", `{$field}`";
			$sql_values .= ", '{$value}'";
		}

		$sql_fields = substr($sql_fields, 2);
		$sql_values = substr($sql_values, 2);

		$sql = "INSERT INTO cadastros ({$sql_fields}) VALUES ({$sql_values})";
		mysqli_query($DB, $sql);
		$cadastro_id = mysqli_insert_id($DB);


		// Pega os ids das tags
		$associaTags = array();
		foreach($DB_CAMPOS_TAGS as $field=>$tags) {
			$ids = array();
			foreach($tags as $tag) {
				$sql = "SELECT id FROM `tags` WHERE `tag`='{$tag}'";
				$grade = mysqli_query($DB, $sql);
				if($campos = mysqli_fetch_array($grade)) {
					$ids[] = $campos['id'];
				} else {
					$sql = "INSERT INTO `tags` (`tag`) VALUES ('{$tag}')";
					mysqli_query($DB, $sql);
					$ids[] = mysqli_insert_id($DB);
				}
			}

			$associaTags[$field] = $ids;
		}


		// Associa as tags ao cadastro
		foreach($associaTags as $field=>$tags_ids) {
			foreach($tags_ids as $tag_id) {
				$sql = "INSERT INTO cadastros_tags (`cadastro_id`, `tag_id`, `campo`) VALUES ('{$cadastro_id}', '{$tag_id}', '{$field}')";
				mysqli_query($DB, $sql);
			}
		}

		return $cadastro_id;
	}
?>