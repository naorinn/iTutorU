<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>
		<div class="content_block">
	
	    <div style="background-color: white; padding-bottom: 3%">
			<div id="profileImageHeader" ></div>
	        <div id="profileImage" style="">
	        	<h3 style="bottom: -70;position: absolute;text-align:  center;margin: auto;width: 100%;">
		        	<p><?php $tutor = $data['tutor'];
			        print("$tutor->firstName $tutor->lastName");?></p>
			        
		        	<a class='btn btn-primary' href="/Request/create/<?php echo $tutor->userId?>">Request tutor</a>
					<a class='btn btn-primary' href='/Thread/find/<?php echo $tutor->userId?>'>Contact tutor</a>
		        </h3>

			        


	         </div>

	                
	    </div>

	</body>
</html>