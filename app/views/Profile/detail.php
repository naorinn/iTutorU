<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Tutor profile</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

		<?php
			$tutor = $data['tutor'];
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

      	?>
		<div class="content_block">
			
		    <div style="background-color: white; padding-bottom: 3%">
				<div id="profileImageHeader" ></div>
		        <div id="profileImageIndex" style="background-image: url('/images/<?php echo $tutor->profileImagePath?>')">
		        	<h3 style="bottom: -70;position: absolute;text-align:  center;margin: auto;width: 100%;">
			        	<p><?php print("$tutor->firstName $tutor->lastName");?></p>
				        
			        	<a class='btn btn-primary' href="/Request/create/<?php echo $tutor->userId?>">Request tutor</a>
						<a class='btn btn-primary' href='/Thread/find/<?php echo $tutor->userId?>'>Contact tutor</a>
			        </h3>
			        	

			    </div>

		      </div>     
<p style="vertical-align: center; text-align: center; margin-top: 3%;"><?php print("$stars");?></p>
		      <h3 style="vertical-align: center; text-align: center; margin-top: 4%;">

		      	
		      		
		      		<p><?php print("$tutor->schoolName");?></p><br/>
			        <p><?php print("$tutor->programName");?></p><br/>
			        <p><?php print("$tutor->about");?></p>

		      </h3>  
	    </div>

	</body>
</html>