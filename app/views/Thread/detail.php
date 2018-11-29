<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		
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
						
							foreach($messages as $message){											
								if($message->senderId = $_SESSION['userId']){
									print("
										<div class='alert alert-success usermessage' style='text-align: right'>	    
											<p>$message->messageText</p>	
											<small>$message->timestamp</small>
										</div><br/>
									");
								}
								else{
									print("
										<div class='alert alert-info contactmessage' style='text-align: left'>	    
											<p>$message->messageText</p>	
											<small>$message->timestamp</small>
										</div><br/>
									");
								}
							}
						?>
					</div>
					<!--<form id="messageForm" class="row">
						<input id="messageInput" class="" type="text" placeholder="Enter a message..." />
						<input type="submit" value="Send"   />
					</form>-->
					<form action="/Message/create" method="post" id="messageForm" class="input-group">
					   <input type="text" class="form-control">
					   <span class="input-group-btn">
					        <input class="btn btn-info" type="submit" value="Send" />
					   </span>
					</form>
				</div>

			</div>

	</body>
</html>