<?php


	/**
	 * Valida se esta logado
	 */
	session_start();
	if(!isset($_SESSION['ef_admin_login'])) {
		header("location: index.php");
		die();
	}


	/**
	 * Pega todas as tags existentes
	 */
	$CAMPOS_TAGS = array();
	$sql = "SELECT DISTINCT `cadastros_tags`.`tag_id`, `cadastros_tags`.`campo`, `tags`.`tag` FROM `cadastros_tags`, `tags` WHERE `tags`.`id`=`cadastros_tags`.`tag_id` ORDER BY `cadastros_tags`.`campo` ASC, `tags`.`tag` ASC";
	$gradeTags = mysqli_query($DB, $sql);
	while($campos = mysqli_fetch_array($gradeTags)) {
		$CAMPOS_TAGS[] = $campos['campo'];
	}


	/**
	 * Search
	 */
	$SEARCH = array();
	if(isset($_GET['search'])) {
		foreach($_GET['search'] as $key=>$value) {
			$modValue = $value;
			if(array_search($key, $CAMPOS_TAGS)!==false) {
				$value = explode(",",$value);
				$modValue = array();
				foreach($value as $v) {
					$modValue[] = trim($v);
				}
			}
			$SEARCH[$key] = $modValue;
		}
	}



	/**
	 * Tags
	 */
	function tagsGeraLink($campo, $tagname) {
		global $SEARCH;

		//$url = "list.php?search=";
		$modifiedSearch = $SEARCH;
		foreach($modifiedSearch as &$ms) {
			if(is_array($ms)) $ms = implode(",",$ms);
		}


		if(isset($modifiedSearch[$campo])) {
			$tags = explode(",",$modifiedSearch[$campo]);
			$tem = false;
			$tags_tratadas = array();
			foreach($tags as $tag) {
				$tag = trim($tag);
				if($tag!=$tagname) {
					$tags_tratadas[] = $tag;
				} else {
					$tem=true;
				}
			}
			if(!$tem) $tags_tratadas[] = $tagname;
			$modifiedSearch[$campo] = implode(",", $tags_tratadas);
		} else {
			$modifiedSearch[$campo]	= $tagname;
		}

		return "list.php?" . http_build_query(array("search"=>$modifiedSearch));
	}

	$TAGS = array();
	$sql = "SELECT DISTINCT `cadastros_tags`.`tag_id`, `cadastros_tags`.`campo`, `tags`.`tag` FROM `cadastros_tags`, `tags` WHERE `tags`.`id`=`cadastros_tags`.`tag_id` ORDER BY `cadastros_tags`.`campo` ASC, `tags`.`tag` ASC";
	$gradeTags = mysqli_query($DB, $sql);
	while($campos = mysqli_fetch_array($gradeTags)) {
		if(!isset($TAGS[$campos['campo']])) $TAGS[$campos['campo']] = array();
		/*echo "INICIAL<br />";
		print_r($SEARCH);
		echo "<br />FIM INICIAL<br />";*/
		$TAGS[$campos['campo']][$campos['tag']] = array(
			"id" => $campos['tag_id'],
			"tag" => $campos['tag'],
			"href" => tagsGeraLink($campos['campo'], $campos['tag']),
		);

		/*echo "FINAL<br />";
		print_r($SEARCH);
		echo "<br />FIM FINAL<br />";*/
	}


	/**
	 * Lista o resultado
	 */
	$CADASTROS = array();

	// Pega os cadastros limitando a 100 por página
	$sql = "SELECT __WHAT__ FROM `cadastros`";

	if(!empty($SEARCH)) {
		$where = '';
		$whereTags = '';
		// LISTA FILTRADO
		foreach($SEARCH as $campo=>$query) {
			if(!isset($TAGS[$campo])) {
				$where .= " AND `{$campo}` like '%{$query}%'";	
			} else {
				foreach($query as $searchTag) {
					if(isset($TAGS[$campo][$searchTag])) {
						$searchTagId = $TAGS[$campo][$searchTag]['id'];
						$where .= " AND (SELECT count(*) FROM `cadastros_tags` WHERE `cadastros_tags`.`cadastro_id`=`cadastros`.`id` AND `cadastros_tags`.`tag_id`='{$searchTagId}' AND `cadastros_tags`.`campo`='{$campo}')";
					}
				}
			}
		}
		if(!empty($whereTags)) $where .= " AND (" . substr($whereTags, 4) . ")";

		if(!empty($where)) {
			$sql = "SELECT __WHAT__ FROM `cadastros` WHERE " . substr($where, 5);
		}
	}


	// Paginacao
	$sql_qty = str_replace("__WHAT__", "count(*) qtd", $sql);
	$grade = mysqli_query($DB, $sql_qty);
	$campos = mysqli_fetch_array($grade);
	$paginacao_pagina = isset($_GET['p']) ? intval($_GET['p']) : 1;
	$paginacao_total = intval($campos['qtd']);
	$paginacao_limite = 100;
	$paginacao_limite_inicial = ($paginacao_pagina-1)*$paginacao_limite;
	$paginacao_paginas = ceil($paginacao_total/$paginacao_limite);

	$sql = str_replace("__WHAT__", "DISTINCT `cadastros`.*", $sql);
	$sql .= " LIMIT {$paginacao_limite_inicial}, {$paginacao_limite}";


	$grade = mysqli_query($DB, $sql);
	while($campos = mysqli_fetch_array($grade, MYSQLI_ASSOC)) {
		$cadastro_id = $campos['id'];
		$sql2 = "SELECT `cadastros_tags`.`campo`, `tags`.`tag` from `cadastros_tags`,`tags` WHERE `cadastro_id`={$cadastro_id} AND `tags`.`id`=`cadastros_tags`.`tag_id`";
		$grade2 = mysqli_query($DB, $sql2);
		while($campos2 = mysqli_fetch_array($grade2)) {
			if(!isset($campos[$campos2['campo']])) $campos[$campos2['campo']]=array();
			$campos[$campos2['campo']][] = $campos2['tag'];
		}

		$CADASTROS[] = $campos;
	}

	/*echo "<pre>";
	print_r($CADASTROS);
	echo "</pre>";*/

?>