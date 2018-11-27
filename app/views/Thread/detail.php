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
					<h4>Message from...</h4>	
					<div class="">
						<?php 
							$messages = $data['messages'];
							//var_dump($messages);
							foreach($messages as $message){											
								if($message->senderId = $_SESSION['userId']){
									print("
										<div class='alert alert-success usermessage' style='text-align: right'>	    
											<p>$message->messageText</p>	
											<small>$message->timestamp</small>
										</div>
									");
								}
								else{
									print("
										<div class='alert alert-info contactmessage' style='text-align: left'>	    
											<p>$message->messageText</p>	
											<small>$message->timestamp</small>
										</div>
									");
								}
							}
						?>
					</div>
				</div>

			</div>

	</body>
</html>