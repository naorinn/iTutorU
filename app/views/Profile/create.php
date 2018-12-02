<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<header class="main"></header>	
			<div class="content_block">			
				<h3><b>Create Profile</b></h3>
				<!--<form action="" method="post" enctype="multipart/form-data">
					<img src='<?php echo ($data['profileImage']); ?>' /> <br/><br/>
					<input type="file" name="profileImagePath" >
					<input type="submit" class="btn btn-info mb-2" name="action"/>
				</form>
			-->

				<form method="post" action="_create">
					<div id="profile_create" class="form-group">
					
						<div class="form-row">
							<div class="col">
								<label for="firstName">
									First name:
									<input name="firstName" required="required" pattern="^[a-zA-Zàâçéèêëîïôûùüÿñæœ .-]{1,30}$" title="First name must be letters, maximum 30 characters" type="text" class="form-control form-control-sm"/>
								</label>
							</div>
								
							<div class="col">
								<label for="lastName">
									Last name:
									<input name="lastName" required="required" pattern="^[a-zA-Zàâçéèêëîïôûùüÿñæœ .-]{1,30}$" title="Last name must be letters, maximum 30 characters" type="text" class="form-control form-control-sm"/>
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
									print("<option value ='$school->schoolId'>$school->schoolName</option>");
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
									print("<option value='$program->programId'>$program->programName</option>");
								}

							?>


						</select>	
					</label>
					<br/><br/>

					<input class="btn btn-primary mb-2" type="submit" value="Create profile"/>
					<br><br>					
				</div>
				</form>
				
			</div>

	</body>
</html>