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
	
	    <div style="background-color: white; padding-bottom: 3%">
			<div id="profileImageHeader" ></div>
	        <div id="profileImage" style="">
	        	<h3 style="bottom: -70;position: absolute;text-align:  center;margin: auto;width: 100%;">
		        	<p><?php $tutor = $data['tutor'];
			        print("$tutor->firstName $tutor->lastName");?></p>
			        
		        	<a class='btn btn-primary' href='/Request/create/$tutor->userId'>Request tutor</a>
					<a class='btn btn-primary' href='/Thread/findThread/$tutor->userId'>Contact tutor</a>
		        </h3>

			        


	         </div>

	                
	    </div>

	</body>
</html>