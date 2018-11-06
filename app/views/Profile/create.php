<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
	</head>
	<body>
		<?php include_once('/../Default/header.php')?>

			<div class="content_block">
				<h3><b>Create Profile</b></h3>
				<img src='<?php echo $data["profileImage"]?>'  /> <br/><br/>
				<a class="btn btn-info mb-2"  href="#">Change profile image</a><br/><br/>
				<form method="post" action="_create">
					<div id="profile_create" class="form-group">
					
					<div class="form-row">
						<div class="col">
							<label for="firstName">
								First name:
								<input name="firstName" required="required" pattern="" title="" type="text" class="form-control form-control-sm"/>
							</label>
						</div>
							
						<div class="col">
							<label for="lastName">
								Last name:
								<input name="lastName" required="required" pattern="" title="" type="text" class="form-control form-control-sm"/>
							</label>
							<br/><br/>
						</div>
					</div>
					

					<label for="school">
						School:
						<select  class="form-control form-control-sm" required="required" name="school" size="5">
							<?php
								$schools = $data['schools'];
								var_dump($a);
								foreach($schools as $schoolName){
									print("<option>$schoolName</option>");
								}
							?>
						</select>						
					</label>
					<br/><br/>

					<label for="program">
						Program:
						<input name="program" required="required" pattern="" title="" type="text" class="form-control form-control-sm"/>
					</label>
					<br/><br/>

					<input class="btn btn-primary mb-2" type="submit" value="Register"/>
					<br><br>					
				</div>
				</form>
				
			</div>

	</body>
</html>