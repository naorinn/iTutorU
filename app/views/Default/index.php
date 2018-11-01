<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
	</head>
	<body>
		<header class="main"></header>	

			<form method="post" action="Default/login">
				<div id="sign_in" class="form-group">
					<h4><b><u>Sign in</u></b></h4>
					<label for="username">
						Username:
						<input name="username" type="text" class="form-control form-control-sm"/>
					</label>
					<br/><br/>
					<label for="password">
						Password:
						<input name="password" type="password" class="form-control form-control-sm"/>
						<small class="form-text text-muted"><a>Forgot password?</a></small>
					</label>
					<br>
					<input class="btn btn-primary mb-2" type="submit" value="Login"/>
					<br><br>
					<small class="form-text text-muted">Don't have an account? <a>Create one!</a></small>
				</div>

			</form>

	</body>
</html>