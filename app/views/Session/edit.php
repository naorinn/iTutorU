<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php'); ?>
		<title>iTutorU - Edit session</title>
	</head>
	<body>
		<?php 
			include_once('app/views/Default/header.php'); 
			 $session = $data['session']; 
			
		 ?>
			<div class="content_block">			
				<h3>Edit session with <?php print("$session->firstName $session->lastName");?></h3>
				
				<form method="post" action="/Session/_edit">
					<label for="sessionId">						
						<input name='sessionId' hidden value='<?php echo $session->sessionId?>' />
					</label>
					<br/>
					<label for="date">
						Select a date:
						<input name="date" type="date" required />
					</label>
					<br/>
					<br/>

					<label for="time">
						Select a time:
						<input name="time" type="time" required/>
					</label>
					<br/>
					<br/>
					

					<input type="submit" value="Save" class="btn btn-info"/>
					<a href="/User/home" class="btn btn-danger"/>Cancel</a>
				</form>
				
			</div>

	</body>
</html>