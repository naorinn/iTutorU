<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Search</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">					
				<form action="/Tutor/advancedSearch" method="get" id="advanced_search">
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="subject">
								Subject: <input  class="form-control form-control-sm" type="text" name="subject" />&nbsp;&nbsp;
							</label>
						</div>
						<div class="form-group col-md-4">
							<label for="program">
								Program:
								<select  class="form-control form-control-sm" name="program" >
									<option value="" selected> -- Any --</option>
									<?php
										$programs = $data['programs'];	

										foreach($programs as $program){											
											print("<option value='$program->programId'>$program->programName</option>");																			
										}

									?>


								</select>&nbsp;&nbsp;
							</label>
						</div>
						<div class="form-group col-md-2">
							<label for="price">
								Price: <input class="form-control form-control-sm" type="number" name="price" placeholder="$$" min="0" max="30" />&nbsp;&nbsp;
							</label>
						</div>
						<div class="form-group col-md-2">
							<label for="price_upper">
								&nbsp;<input class="form-control form-control-sm" type="number" name="price_upper" placeholder="$$" min="0" max="30" />&nbsp;&nbsp;
							</label>
						</div>							
						
						<br/>
						<input class="btn btn-light" type="submit" value="Search"/>
							
						
					</div>		
				</form>
				<br/>
				<h4 style="margin-top: 0">Results</h4>	
				<?php $tutors = $data['tutors'] ?>
				<div class="">
					<?php 						
						foreach($tutors as $tutor){
							$stars = "";
							$starsFilled= 0;
							$noRatings = "";
							if($tutor->rating != 0){						
								for($i = 0; $i < $tutor->rating; $i++){

									$stars .= "<span style='font-size: 25px; margin: 0'>&#9733;</span>";
									$starsFilled++;
								}
							}
							else{
								$noRatings = "<br/>No ratings yet";
							}
							while($starsFilled < 5){
								$stars .= "<span style='font-size: 25px; margin: 0'>&#9734;</span>";
								$starsFilled++;
							}
							print("
								<div class='card' style='width: 300px; float: left; margin: 20px;'>
									<img src='/images/$tutor->profileImagePath' alt='bookCardImgage' class='tutor'/>
									<div class='cardBlock'>
										<h4 style='margin-bottom: 0'>$tutor->firstName  $tutor->lastName</h4>
										$stars
										<small>$noRatings</small>
										<p><b>Description:</b> $tutor->description</p>
										<p><b>$$tutor->pay / session</b></p>
											<a class='btn btn-primary btn-block' style='width: 73%' href='/Request/create/$tutor->userId'>Request tutor</a>
											<a class='btn btn-primary btn-block' style='width: 73%' href='/Profile/detail/$tutor->userId'>View Profile</a>
									</div>
								</div>");
							}
					?>
				</div>
			</div>
	</body>
</html>