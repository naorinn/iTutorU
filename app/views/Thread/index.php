<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="../../../javascript/script.js"></script>
		<title>iTutorU - Messages</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">				
				<?php
					if(isset($data['message'])){

						$message = $data['message'];
					
						if($message != ''){
							print("<div class='alert alert-success' role='alert'><strong>$message</strong></div>");
						}
					}
				?>
				<div>
					<h4>Threads</h4>	
					<div class="">
						<?php 
							$threads = $data['threads'];

							foreach($threads as $thread){											
								
								print("
									<a class='row' href='/Thread/detail/$thread->threadId'>
										<div class='col-md-1'>
											<img src='/images/$thread->profileImagePath' width='75%' style='border-radius: 25%'/>
										</div>
										<div class='col-md-2'>
										  <h5 class='card-header'>$thread->firstName $thread->lastName</h5>
										  <div class='card-body'>								    
										    <p class='card-text'></p>										    
										  </div>
										</div>
									</a><hr/>");
								}
						?>
					</div>
				</div>

			</div>

	</body>
</html>