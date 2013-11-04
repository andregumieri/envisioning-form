<!-- RESULTS -->
<script type="text/javascript">
	var DataCadastros = {};
</script>
<table class="table table-striped" id="tabelaCadastros">
	<thead>
		<tr>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($CADASTROS as $cadastro): ?>
		<tr data-cadastro-id="<?php echo $cadastro['id']; ?>">
			<script type="text/javascript">
				DataCadastros[<?php echo $cadastro['id']; ?>] = <?php echo json_encode($cadastro); ?>;
			</script>
			<td>
				<?php echo $cadastro['lastname']; ?>, <?php echo $cadastro['firstname']; ?><br />
				<small>
					<?php
						$city = $cadastro['city'];
						$state = $cadastro['state'];
						$country = $cadastro['country'];
						if(!empty($city)) echo $city;
						if(!empty($state) && !empty($city)) echo ", ";
						if(!empty($state)) echo $state;
						if((!empty($state) || !empty($city)) && !empty($country)) echo ", ";
						if(!empty($country)) echo $country;
					?>
				</small>
			</td>
			<!--<td><?php echo date("d/m/Y H:i", strtotime($cadastro['timestamp'])); ?></td>-->
			<td class="r botoes">
				<button type="button" class="btn btn-default botaoEditar"><span class="glyphicon glyphicon-pencil"></span></button>
				<button type="button" class="btn btn-danger botaoDeletar"><span class="glyphicon glyphicon-remove"></span></button>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>


<!-- PAGINATION -->
<?php if($paginacao_paginas>1) { ?>
<ul class="pagination ">
	<?php
	$query = $_GET;
	if($paginacao_pagina<=1) {
		echo "<li class=\"disabled\"><span>&laquo;</span></li>";
	} else {
		$query['p'] = $paginacao_pagina-1;
		$url = "list.php?" . http_build_query($query);
		echo "<li><a href=\"{$url}\">&laquo;</a></li>";
	}
	//
	
	for($x=1; $x<=$paginacao_paginas; $x++) { 
		$query['p'] = $x;
		$url = "list.php?" . http_build_query($query);

		$active = ($paginacao_pagina==$x) ? 'active' : '';
		echo "<li class=\"{$active}\"><a href=\"{$url}\">{$x}</a></li>";
	}
	
	if($paginacao_pagina>=$paginacao_paginas) {
		echo "<li class=\"disabled\"><span>&raquo;</span></li>";
	} else {
		$query['p'] = $paginacao_pagina+1;
		$url = "list.php?" . http_build_query($query);
		echo "<li><a href=\"{$url}\">&raquo;</a></li>";
	}
	//<li><a href="#">&raquo;</a></li>
	?>
</ul>
<?php } ?>