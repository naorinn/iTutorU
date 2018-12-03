<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>
		<div class="content_block">
			<?php $tutor = $data['tutor'];?>
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

		      <h3 style="vertical-align: center; text-align: center; margin-top: 8%;">


		      		<p><?php print("$tutor->schoolName");?></p><br/>
			        <p><?php print("$tutor->programName");?></p>

		      </h3>  
	    </div>

	</body>
</html>