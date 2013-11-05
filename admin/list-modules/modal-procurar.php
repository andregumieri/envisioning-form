<?php
	adicionaCampoDeBusca("purpose", "Purpose");
	adicionaCampoDeBusca("you", "You");
	adicionaCampoDeBusca(); // Separador
	adicionaCampoDeBusca("city", "City");
	adicionaCampoDeBusca("country", "Country");
	adicionaCampoDeBusca("email", "Email");
	adicionaCampoDeBusca("firstname", "First name");
	adicionaCampoDeBusca("lastname", "Last name");
	adicionaCampoDeBusca("state", "State");
	adicionaCampoDeBusca(); // Separador
	adicionaCampoDeBusca("linksfacebook", "Links: Facebook");
	adicionaCampoDeBusca("linkslinkedin", "Links: Linkedin");
	adicionaCampoDeBusca("linkstwitter", "Links: Twitter");
	adicionaCampoDeBusca("linksurl", "Links: URL");

	/** PARE DE EDITAR A PARTIR DAQUI **/
?>
<div class="modal fade" id="modalProcurar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title">Busca Avançada</h4>
			</div>

			<div class="modal-body">
				
				<form role="form" method="get" action="list.php" id="searchForm">
				<div class="input-group">
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="searchCampoSelecionado">Selecione o campo</span> <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<?php 
							foreach($modalProcurarCamposDeBusca as $campo) {
								if(is_array($campo)) {
									echo "<li><a data-field=\"{$campo['campo']}\">{$campo['titulo']}</a></li>";
								} else {
									echo '<li class="divider"></li>';		
								}
							}
							?>
						</ul>
					</div><!-- /btn-group -->

					<input type="text" class="form-control" id="searchString" />

					<span class="input-group-btn">
						<button class="btn btn-default" type="button" id="searchBotaoAdd"><span class="glyphicon-plus"></span></button>
					</span>
				</div><!-- /input-group -->
				
				
					<ul class="list-group" id="searchList"></ul>

					<button type="submit" id="searchBotaoProcurar" class="btn btn-default btn-procurar">Procurar</button>
				</form>
			</div> <!-- .modal-body -->
		</div>
	</div>
</div>