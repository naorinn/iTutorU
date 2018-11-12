<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
	</head>
	<body>
		<?php include_once('/../Default/header.php')?>

			<div class="content_block">			
				<h3><b>Profile Image</b></h3>
				<form>
					<img id="profileImage" src='<?php echo $data["profileImage"]?>' /> <br/><br/>
					<a class="btn btn-info mb-2"  href="#">Select image</a>
					<a class="btn btn-info mb-2"  href="#">Reset image</a><br/><br/>
				</form>
				
			</div>

	</body>
</html>