<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Delete session</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">			
				<h3><b>Delete session</b></h3>
				<?php $session = $data['session'];?>

				<form action="/Session/_delete" method="post">	
					<div>Delete session?</div><br/>
					<div>Session:</div>
					<div>With: <?php print("$session->firstName $session->lastName"); ?></div>
					<input name="sessionId" hidden value='<?php echo $session->sessionId; ?>'/>
					<div>Date: <?php echo $session->session_date; ?></div><br/>
					<input type="submit" class="btn btn-primary" value="Delete"/>
					<a href="/User/home" class="btn btn-primary">Cancel</a>
				</form>
				
			</div>

	</body>
</html>
