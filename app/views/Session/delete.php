<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">			
				<h3><b>Delete session</b></h3>
				<?php $session = $data['session'];?>

					
				<div>Delete session?</div><br/>
				<div>Session:</div>
				<div>With: <?php print("$session->firstName $session->lastName"); ?></div>
				<div>Date: <?php echo $session->session_date; ?></div><br/>
				<a href="" class="btn btn-primary">Delete</a>
				<a href="/User/home" class="btn btn-primary">Cancel</a>
				
				
			</div>

	</body>
</html>
