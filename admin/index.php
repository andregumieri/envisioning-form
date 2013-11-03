<?php require('_header.php'); ?>

<div class="page-header">
	<h1>Login</h1>
</div>
<form role="form" method="post" action="login.php">
	<div class="form-group">
		<input type="text" class="form-control" id="txtUsername" name="username" placeholder="Username" />
	</div>

	<div class="form-group">
		<input type="password" class="form-control" id="txtPassword" name="password" placeholder="Password" />
	</div>

	<button type="submit" class="btn btn-default">Logar</button>
</form>

<?php require('_footer.php'); ?>