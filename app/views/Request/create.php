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
				<h3><b>Send a request</b></h3>
				<?php $tutor = $data['tutor']; ?>
				<form method="post" action="/Request/_create">
					<label for="tutorId">
						<p>Send a tutoring request to <?php print("$tutor->firstName $tutor->lastName");?></p>
						<input name='tutorId' hidden value='<?php echo $tutor->userId?>' />
					</label>
					<br/>
					<label for="date">
						Select a date:
						<input name="date" type="date" required/>
					</label>
					<br/>
					<br/>

					<label for="time">
						Select a time:
						<input name="time" type="time" required/>
					</label>
					<br/>
					<br/>
					
					<label for="details">
						<textarea name="details" placeholder="Add more information here..." rows="10" cols="50" required></textarea>
					</label>
					<br/>
					<br/>

					<input type="submit" value="Send request" />
				</form>
				
			</div>

	</body>
</html>