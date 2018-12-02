<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
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
					<h4>Home</h4>	
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