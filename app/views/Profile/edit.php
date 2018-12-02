<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	</head>
	<body>
		<?php include_once('app/views/Default/header.php')?>
		<?php $profile = $data['profile'];?>

			<div class="content_block">		
				<?php 
					$user = $this->model('User');
					$isTutor = $user->isTutor();
					
				 ?>	
				<?php
					$message = $data['message'];
					if($message != ''){
						print("<div class='alert alert-success' role='alert'><strong>$message</strong></div>");
					}
				?>
				<h4>Edit Profile</h4>
				<form action="_updateProfileImage" method="post" enctype="multipart/form-data">
					<img src='<?php echo "/images/". ($profile->profileImagePath == null?'profile_default.jpg':$profile->profileImagePath); ?>' /> <br/>
					<input type="file" name="profileImagePath" ><br/>
					<input type="submit" class="btn btn-info mb-2" value="Change profile image"/><br/><br/>
				</form>
				<form method="post" action="_edit">
					<div id="profile_create" class="form-group">
					
						<div class="form-row">
							<div class="col">
								<label for="firstName">
									First name:
									<input name="firstName" required="required" pattern="^[a-zA-Zàâçéèêëîïôûùüÿñæœ .-]{1,30}$" title="First name must be letters, maximum 30 characters" type="text" class="form-control form-control-sm" value="<?php echo $profile->firstName?>" />
								</label>
							</div>
								
							<div class="col">
								<label for="lastName">
									Last name:
									<input name="lastName" required="required" pattern="^[a-zA-Zàâçéèêëîïôûùüÿñæœ .-]{1,30}$" title="Last name must be letters, maximum 30 characters" type="text" class="form-control form-control-sm" value="<?php echo $profile->lastName?>"/>
								</label>
								<br/><br/>
							</div>
						</div>
					

					<label for="school">
						School:
						<select  class="form-control form-control-sm" required="required" name="school" size="5">
							<?php
								$schools = $data['schools'];								
								foreach($schools as $school){
									if($school->schoolId == $profile->schoolId) {
										print("<option value ='$school->schoolId' selected>$school->schoolName</option>");
									}
									else{
										print("<option value ='$school->schoolId'>$school->schoolName</option>");
									}
								}
							?>
						</select>						
					</label>
					<br/><br/>

					<label for="program">
						Program:
						<select  class="form-control form-control-sm" required="required" name="program" size="5">
							<?php
								$programs = $data['programs'];	

								foreach($programs as $program){
									if($program->programId == $profile->programId) {
										print("<option value='$program->programId' selected>$program->programName</option>");
									}
									else{
										print("<option value='$program->programId'>$program->programName</option>");
									}									
								}

							?>


						</select>	
					</label>
					<br/><br/>

					<input class="btn btn-primary mb-2" type="submit" value="Update profile"/>
					<br><br>					
				</div>
				</form>
				
			</div>

	</body>
</html>