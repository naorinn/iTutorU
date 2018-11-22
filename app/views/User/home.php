<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<script src="../../../javascript/script.js"></script>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">
				<?php
					$message = $data['message'];
					if($message != ''){
						print("<div class='alert alert-success' role='alert'><strong>$message</strong></div>");
					}
				?>
				<div>
					<h4>Home</h4>
					
					<?php echo crypt(crypt('1664931', 1664931), 1664931);?>
					<div id="calendar"></div>
					<script>
						var days = getDays();
						for(var x = 0; x <= days; x++){
							for(var y = 0; y < )
						}
					</script>

				</div>

			</div>

	</body>
</html>