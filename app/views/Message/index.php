<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Messages</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">				
				<?php
				if(isset($data['message'])){

					$message = $data['message'];
				
					if($message != ''){
						print("<div class='alert alert-success' role='alert'><strong>$message</strong></div>");
					}
				}
				?>
				<div>
					<h4>Messages</h4>	
					

				</div>

			</div>

	</body>
</html>