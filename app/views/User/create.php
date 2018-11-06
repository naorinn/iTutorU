<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
	</head>
	<body>
		<header class="main"></header>	
		<div id="register">
			<form method="post" action="_create">
				
				<div id="register" class="form-group">
					
					<label for="username">
						Username:
						<input name="username" required="required" pattern="^[0-9]{7}$" title="Your username is your school ID" type="text" class="form-control form-control-sm"/>
					</label>
					<br/><br/>
					<label for="password">
						Password:
						<input name="password" required="required" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Your password must be 8 characters long, contain at least one uppercase, contain at least one lowercase, contain at least one number, contain at least one special character" class="form-control form-control-sm"/>
						
					</label>
					<br/><br/>
					<label for="retypePassword">
						Re-type password:
						<input name="retypePassword" required="required" type="password" class="form-control form-control-sm"/>
						
					</label>
					<br/><br/>
					<input class="btn btn-primary mb-2" type="submit" value="Register"/>
					<br><br>					
				</div>
			</form>
		</div>
	</body>
</html>

