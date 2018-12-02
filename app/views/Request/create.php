<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
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