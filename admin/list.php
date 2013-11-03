<?php require('_header.php'); ?>

<div class="page-header">
	<h1>List <button type="button" class="btn btn-link">Link</button></h1>
</div>

<!-- SEARCH PANEL -->
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Search</div>

	<!-- Input com botao -->
	<div class="panel-body">
		<div class="input-group">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Another action <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</div><!-- /btn-group -->

			<input type="text" class="form-control">

			<span class="input-group-btn">
				<button class="btn btn-default" type="button"><span class="glyphicon-plus"></span></button>
			</span>
		</div><!-- /input-group -->
	</div>


	<ul class="list-group">
		<li class="list-group-item"><span class="label label-primary">tags</span> esportes, avioes, musica <button type="button" class="close" aria-hidden="true">&times;</button></li>
		<li class="list-group-item"><span class="label label-primary">nome</span> freitas <button type="button" class="close" aria-hidden="true">&times;</button></li>
		<li class="list-group-item"><span class="label label-primary">email</span> gmail <button type="button" class="close" aria-hidden="true">&times;</button></li>
	</ul>


</div>


<!-- RESULTS -->
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Added</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Freitas, André <span class="label label-primary">New</span></td>
			<td>02 Nov 13, 13:34</td>
			<td>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-heart-empty"></span></button>
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
			</td>
		</tr>
		<tr>
			<td>Freitas, André <span class="label label-primary">New</span></td>
			<td>02 Nov 13, 13:34</td>
			<td>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
			</td>
		</tr>
		<tr>
			<td>Freitas, André</td>
			<td>02 Nov 13, 13:34</td>
			<td>
				<span class="glyphicon glyphicon-pencil"></span>
				<span class="glyphicon glyphicon-trash"></span>
			</td>
		</tr>
		<tr>
			<td>Freitas, André</td>
			<td>02 Nov 13, 13:34</td>
			<td>
				<span class="glyphicon glyphicon-pencil"></span>
				<span class="glyphicon glyphicon-trash"></span>
			</td>
		</tr>
	</tbody>
</table>


<!-- PAGINATION -->
<ul class="pagination ">
	<li><a href="#">&laquo;</a></li>
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">&raquo;</a></li>
</ul>

<?php require('_footer.php'); ?>