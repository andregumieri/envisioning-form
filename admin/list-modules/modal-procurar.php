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
							<!-- <li><a data-field="related" data-tag="true">Industries/Fields</a></li> -->
							<!-- <li><a data-field="learn" data-tag="true">Like to learn</a></li> -->
							<!-- <li><a data-field="teach" data-tag="true">Like to teach</a></li> -->
							<li><a data-field="purpose">Purpose</a></li>
							<!-- <li><a data-field="passions" data-tag="true">Passions</a></li> -->
							<li><a data-field="you">You</a></li>
							<li class="divider"></li>
							<li><a data-field="city">City</a></li>
							<li><a data-field="country">Country</a></li>
							<li><a data-field="email">Email</a></li>
							<li><a data-field="firstname">First name</a></li>
							<li><a data-field="lastname">Last name</a></li>
							<li><a data-field="linksfacebook">Links: Facebook</a></li>
							<li><a data-field="linkslinkedin">Links: Linkedin</a></li>
							<li><a data-field="linkstwitter">Links: Twitter</a></li>
							<li><a data-field="linksurl">Links: URL</a></li>
							<li><a data-field="state">State</a></li>
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