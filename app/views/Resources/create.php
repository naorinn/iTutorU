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
				<h3><b>Add a new resource</b></h3>
				
				<form method="post" action="_create">					
					
					<label for="name">
						Name of resource:
						<input name="name" type="text" required/>
					</label>
					<br/>
					<br/>

					<label for="source">
						Source/link to resource:
						<input name="source" type="text" placeholder="resource@example.com" required/>
					</label>
					<br/>
					<br/>
					
					<label for="description">
						Description:<br/>
						<textarea name="description" placeholder="Add a description of this resource..." rows="5" cols="50" required></textarea>
					</label>
					<br/>
					<br/>

					<label for="programs[]">
						Programs:
						<br/>
						<small>To select multiple programs hold Ctrl and select</small>
						<select  class="form-control form-control-sm" name="programs[]" multiple >
							
							<?php
								$programs = $data['programs'];	

								foreach($programs as $program){											
									print("<option value='$program->programId'>$program->programName</option>");																			
								}

							?>
						</select>&nbsp;&nbsp;
					</label>
					<br/>
					

					<input type="submit" value="Add" class="btn btn-primary"/>
				</form>
				
			</div>

	</body>
</html>