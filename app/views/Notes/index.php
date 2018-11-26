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

			<div class="content_block">
				
				<div>
					<h4 style="display: inline-block;">Notes</h4> 
					<div class="form-group col-md-2" style="float: right;padding-right: 0px;padding-left: 0px;width: fit-content;left: 0%;">
					<a href="create" class="btn btn-success">Add note</a>
					</div>
					
					<?php $notes = $data['notes'] ?>
					<div class="">
					<?php 						
						foreach($notes as $note){
							print("
								<div class='card' style='width: 300px; float: left; margin: 20px; background-color: rgb(194, 252, 244)'>
									<div class='cardBlock'>
										<h4 style='margin-bottom: 0'>$note->noteText</h4>
										<a class='btn btn-primary btn-block' href=''>Edit note</a>
									</div>
								</div>");
						}
					?>
					</div>

				</div>

			</div>

	</body>
</html>
