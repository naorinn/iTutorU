<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="note_block">			
				<h3><b>Edit note</b></h3>
				<?php $note = $data['note'];?>
				<form method="post" action="/Notes/_edit/<?php echo $note->noteId ?>">					
					
					<div id="" class="form-group">
					
					<label for="noteText">
						
						<textarea rows="10" cols="50" name="noteText" required="required" type="text" class="form-control form-control-sm"><?php print($note->noteText); ?></textarea>
					</label>
					<br/>

					<input type="submit" value="Save" class="btn btn-primary"/>
					<a href="/Notes/index" class="btn btn-primary">Cancel</a>
				</form>
				
			</div>

	</body>
</html>
