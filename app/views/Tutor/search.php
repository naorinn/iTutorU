<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">			
				<h3><b>Search</b></h3>		
				<?php $tutors = $data['tutors'] ?>
				<div class="">
					<?php 
						foreach($tutors as $tutor){
							$stars = "";
							for($i = 0; $i < $tutor->rating; $i++){

								$stars .= "<span style='font-size: 25px; margin: 0'>&#9733;</span>";
							}
							print("
								<div class='card' style='width: 300px; float: left; margin: 20px;'>
									<img src='/images/$tutor->profileImagePath' alt='bookCardImgage'/>
									<div class='cardBlock'>
										<h4 style='margin-bottom: 0'>$tutor->firstName  $tutor->lastName</h4>
										$stars
										<p><b>Description:</b> $tutor->description</p>
										<p><b>$$tutor->pay / session</b></p>
											<button class='btn btn-primary btn-block'>Contact tutor</button>
											<button class='btn btn-primary btn-block'>Show Details</button>
									</div>
								</div>");
							}
					?>
				</div>
			</div>
	</body>
</html>