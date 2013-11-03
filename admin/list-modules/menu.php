<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<div class="navbar-brand" href="#">Envisioning Form</div>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
	</div>


	<div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
		<div class="nav navbarnav navbar-left  hidden-xs">
			<button type="button" class="btn btn-default navbar-btn" id="tagsBotao"><span class="glyphicon glyphicon-tags"></span> Filtrar por Tags</button>
			<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#modalProcurar"><span class="glyphicon glyphicon-search"></span> Busca avançada</button>
			
			<?php if(!empty($SEARCH)) { ?>
				<button type="button" class="btn btn-default navbar-btn" onclick="javascript: window.location='list.php'"><span class="glyphicon glyphicon-remove"></span> Limpar filtros</button>
			<?php } ?>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li class="visible-xs"><a href="#" data-toggle="modal" data-target="#modalProcurar">Procurar</a></li>
			<li class=""><a href="logout.php">Sair</a></li>
		</ul>
	</div>
</nav>