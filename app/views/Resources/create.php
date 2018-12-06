<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Add resource</title>
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