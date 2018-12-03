<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>
		<div class="content_block">
		<?php $user = $data['user']; ?>
	    <div style="background-color: white; padding-bottom: 3%">
			<div id="profileImageHeader" ></div>
	        <div id="profileImageIndex" style="background-image: url('/images/<?php echo $user->profileImagePath?>')">
	        	<h3 style="bottom: -70;position: absolute;text-align:  center;margin: auto;width: 100%;">
		        	<p><?php print("$user->firstName $user->lastName");?></p>
			        
		        	<a class='btn btn-primary' href="/Profile/edit">Edit profile</a>					
		        </h3>

			        


	         </div>

	                
	    </div>
	</div>

	</body>
</html>