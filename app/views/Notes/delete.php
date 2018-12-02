<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">			
				<h3><b>Delete note</b></h3>
				<?php $note = $data['note'];?>

					
				<div>Delete this note?</div><br/>
				<div>Note:</div>
				<div><?php print($note->noteText); ?></div><br/>
				<a href="/Notes/_delete/<?php echo $note->noteId; ?>" class="btn btn-primary">Delete</a>
				<a href="/Notes/index" class="btn btn-primary">Cancel</a>
				
				
			</div>

	</body>
</html>
