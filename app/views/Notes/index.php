<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
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
								<div class='alert alert-light' style='width: 300px; float: left; margin: 20px; background-color: rgb(194, 252, 244); min-height: 25%';'white-space: pre-line'>
									<a href='delete' type='button' class='btn btn-default' aria-label='Left Align' source='/delete' style='float: right'>
  										<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
									</a>
									<a href='edit' type='button' class='btn btn-default' aria-label='Left Align' style='float: right'>
  										<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
									</a>
										<p style='margin-bottom: 0; word-wrap: break-word'>$note->noteText</p>
										</br>
									
								</div>");
						}
					?>
					</div>

				</div>

			</div>

	</body>
</html>
