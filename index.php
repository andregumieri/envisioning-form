<?php
	
?><!DOCTYPE html>
<html>
<head>
	<title>Envisioning</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" />

	<style type="text/css">
		.bootstrap-tagsinput {
			width: 100%;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Evisioning <small>Application form</small></h1>
			<p>Text about this form</p>
		</div>
	</div>

	<div class="container">
		<form role="form" method="post" action="post.php" id="formulario" onsubmit="return false;">
			<div class="panel panel-default">
				<div class="panel-heading">Tell us about yourself</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="txtFirstName" class="control-label">First Name <span class="label label-default">required</span></label>
						<input type="text" class="form-control required" id="txtFirstName" name="firstname" />
					</div>

					<div class="form-group">
						<label for="txtLastName" class="control-label">Last Name <span class="label label-default">required</span></label>
						<input type="text" class="form-control required" id="txtLastName" name="lastname" />
					</div>

					<div class="form-group">
						<label for="txtEmail" class="control-label">Your email</label>
						<input type="email" class="form-control" id="txtEmail" name="email" />
					</div>

					<div class="form-group">
						<label for="txtCountry" class="control-label">Country</label>
						<input type="text" class="form-control" id="txtCountry" name="country" />
					</div>

					<div class="form-group">
						<label for="txtState" class="control-label">State</label>
						<input type="text" class="form-control" id="txtState" name="state" />
					</div>

					<div class="form-group">
						<label for="txtCity" class="control-label">City</label>
						<input type="text" class="form-control" id="txtCity" name="city" />
					</div>

					<div class="form-group">
						<label for="txtPurpose" class="control-label">Purpose</label>
						<textarea class="form-control" rows="3" id="txtPurpose" name="purpose"></textarea>
					</div>

					<div class="form-group">
						<label for="txtPassions" class="control-label">Passions</label>
						<input type="text" class="form-control" id="txtPassions" name="passions" placeholder="Example: traveling, reading, writing" />
						<p class="help-block">Separate your passions using commas.</p>
					</div>

					<div class="form-group">
						<label for="txtLearn" class="control-label">What would you like to learn?</label>
						<input type="text" class="form-control" id="txtLearn" name="learn" placeholder="Example: php, wordpress, rocket science" />
						<p class="help-block">Separate what would you like to learn using commas.</p>
					</div>

					<div class="form-group">
						<label for="txtTeach" class="control-label">What would you like to teach?</label>
						<input type="text" class="form-control" id="txtLearn" name="teach" placeholder="Example: arduino, c++, cooking" />
						<p class="help-block">Separate what would you like to teach using commas.</p>
					</div>

					<div class="form-group">
						<label for="txtRelated" class="control-label">Are you related with any industries/fields? Which Ones?</label>
						<input type="text" class="form-control" id="txtRelated" name="related" placeholder="Example: marketing, internet, biotechnology" />
						<p class="help-block">Separate industries/fields using commas.</p>
					</div>

					<div class="form-group">
						<label for="txtYou" class="control-label">You, in <span id="txtYouLimit">140</span> words <span class="label label-default">required</span></label>
						<textarea class="form-control required" rows="3" id="txtYou" name="you"></textarea>
					</div>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">Links</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="txtCity" class="control-label">Twitter</label>
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="text" class="form-control" placeholder="username" id="txtLinksTwitter" name="linkstwitter" />
						</div>
					</div>

					<div class="form-group">
						<label for="txtCity" class="control-label">Linkedin</label>
						<div class="input-group">
							<span class="input-group-addon">linkedin.com/in/</span>
							<input type="text" class="form-control" placeholder="username" id="txtLinksLinkedin" name="linkslinkedin" />
						</div>
					</div>

					<div class="form-group">
						<label for="txtCity" class="control-label">Facebook</label>
						<div class="input-group">
							<span class="input-group-addon">facebook.com/</span>
							<input type="text" class="form-control" placeholder="username" id="txtLinksFacebook" name="linksfacebook" />
						</div>
					</div>

					<div class="form-group">
						<label for="txtCity" class="control-label">URL</label>
						<div class="input-group">
							<span class="input-group-addon">http://</span>
							<input type="text" class="form-control" placeholder="site.com" id="txtLinksURL" name="linksurl" />
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>


	<script type="text/javascript" src="assets/libs/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="assets/libs/respond.min.js"></script>
	<script type="text/javascript" src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script type="text/javascript" src="assets/js/limitapalavras.jquery.js"></script>
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		var setErro = function($el) {
			$el.parents(".form-group").addClass("has-warning");
			$el.parents(".form-group").find("span.label").removeClass("label-default").addClass("label-warning");
			$el.on("keydown", function() {
				$el.parents(".form-group").removeClass("has-warning");
				$el.parents(".form-group").find("span.label").addClass("label-default").removeClass("label-warning");
				$el.off("keydown");
			})
		};

		document.getElementById('formulario').onsubmit = function() {
			var allowedTags = ['input', 'textarea'];
			var disallowedInputTypes = ['checkbox', 'radio'];
			var allOk = true;
			$(this).find(".required").each(function() {
				if(allowedTags.indexOf(this.tagName.toLowerCase())<0) return false;
				if(this.tagName.toLowerCase()=="input" && disallowedInputTypes.indexOf(this.type.toLowerCase())>=0) return false;
				if(this.value.trim()=='') {
					allOk = false;
					setErro($(this));
				}
			});
			
			return allOk;
		};

		$('#txtPassions,#txtLearn,#txtLearn,#txtRelated').tagsinput({
			confirmKeys: [188, 13]
		});

		$("#txtYou").limitaPalavras({limite: 140, info: '#txtYouLimit'});
	});
	</script>
</body>
</html>