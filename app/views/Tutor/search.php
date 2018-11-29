<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
							<!--<label for="rating">
								Rating: <input type="number" name="rating" placeholder="" min="0" max="5" />
							</label>-->	
					
						<input class="btn btn-light" type="submit" value="Search"/>		
						
					</div>		
				</form>
				<br/>
				<h3 style="margin-top: 0"><b>Results</b></h3>	
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
											<a class='btn btn-primary btn-block' href='/Request/create/$tutor->userId'>Request tutor</a>
											<button class='btn btn-primary btn-block'>View Profile</button>
									</div>
								</div>");
							}
					?>
				</div>
			</div>
	</body>
</html>