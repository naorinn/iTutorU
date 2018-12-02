<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">			
				<h3><b>Profile Image</b></h3>
				<form action="_updateProfileImage" method="post" enctype="multipart/form-data">
					<img src='<?php echo ($data['profileImage']); ?>' /> <br/><br/>
					<input type="file" name="profileImagePath" >
					<input type="submit" class="btn btn-info mb-2" name="action"/>
				</form>
				
			</div>

	</body>
</html>