<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="../../../javascript/script.js"></script>

		<link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
		<link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
 
		<!-- Include JS file. -->
		<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.min.js'></script>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>
		<div class="content_block">
			<form method="post" action="_create">
				
				<div id="" class="form-group">
					
					<label for="description">
						Description:
						<?php $placeholder = "Please list the skills you would be able to tutor. For example: \n- Java \n- English \n- Calculus \n- Guitar"?>
						<textarea rows="10" cols="50" placeholder="<?php echo $placeholder;?>" name="description" required="required" type="text" class="form-control form-control-sm"></textarea>
					</label>
					<br/><br/>
					<label for="pay">
						Pay ($/per sessions):
						<input name="pay" required="required" type="number" min="0" max="30" value="0" class="form-control form-control-sm"/>
						
					</label>
					<br/><br/>
					<label for="about">
						About me:
						<textarea name="about" cols="50" required="required" placeholder="Write a bit about yourself..." type="password" class="form-control form-control-sm" ></textarea>					
					</label>
					<br/><br/>
					<input class="btn btn-primary mb-2" type="submit" value="Save"/>

					<br/><br/>
						<small id="error" style="color: red;"><?php if(isset($data['create_error'])){echo $data['create_error'];}?></small>					
				</div>
			</form>
		</div>
	</body>
</html>

