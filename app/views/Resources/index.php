<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Resources</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">		
						
				<form action="search" method="get" id="resource_search">
					<div class="form-row">
						

						<div class="form-group col-md-2">
							<label for="subject">
								Subject: 
								<input  class="form-control form-control-sm" type="text" name="subject" />&nbsp;&nbsp;
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
						<div class="form-group col-md-1">
						<input class="btn btn-light" type="submit" value="Search"/>		
						</div>
					</div>		
				</form>

				<br/>
				
				<h4 style="display:inline">Resources</h4>	 
				<div class="form-group col-md-2" style="float: right">
					<a href="/Resources/create" class="btn btn-success">Add resource</a>
				</div>
				<br/><br/>
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