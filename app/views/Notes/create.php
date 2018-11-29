<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="../../../javascript/script.js"></script>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="note_block">			
				<h3><b>Add a new note</b></h3>
				
				<form method="post" action="_create">					
					
					<div id="" class="form-group">
					
					<label for="noteText">
						
						<textarea rows="10" cols="50" name="noteText" required="required" type="text" class="form-control form-control-sm"></textarea>
					</label>
					<br/>

					<input type="submit" value="Add" class="btn btn-primary"/>
					<a href="index" class="btn btn-primary">Cancel</a>
				</form>
				
			</div>

	</body>
</html>
