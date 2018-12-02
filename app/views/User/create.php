<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<header class="main"></header>	
		<div id="register">
			<form method="post" action="_create">
				
				<div id="user_register" class="form-group">
					
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

					<br/><br/>
						<small id="error" style="color: red;"><?php if(isset($data['create_error'])){echo $data['create_error'];}?></small>					
				</div>
			</form>
		</div>
	</body>
</html>

