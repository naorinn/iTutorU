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
				<form action="search" method="get" id="advanced_search">
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="subject">
								Subject: <input  class="form-control form-control-sm" type="text" name="subject" />&nbsp;&nbsp;
							</label>
						</div>
						<div class="form-group col-md-4">
							<label for="program">
								Program:
								<select  class="form-control form-control-sm" name="program" >
									<option value="" selected> -- Any --</option>
									<?php
										$programs = $data['programs'];	

										foreach($programs as $program){											
											print("<option value='$program->programId'>$program->programName</option>");																			
										}

									?>


								</select>&nbsp;&nbsp;
							</label>
						</div>
						
						<input class="btn btn-light" type="submit" value="Search"/>		
						
					</div>		
				</form>
				<br/>
				<h3 style="margin-top: 0"><b>Resources</b></h3>	
				<?php $resources = $data['resources'] ?>
				<div class="">
					<?php 						
						foreach($resources as $resource){											
							
							print("
								<div class='card'>
								  <h5 class='card-header'>$resource->resourceName</h5>
								  <div class='card-body'>								    
								    <p class='card-text'>$resource->description</p>
								    <a href='$resource->source' class='btn btn-primary'>Go to $resource->resourceName</a>
								  </div>
								</div><hr/>");
							}

					?>
				</div>
			</div>
	</body>
</html>