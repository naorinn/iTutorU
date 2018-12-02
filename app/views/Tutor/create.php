<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
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

