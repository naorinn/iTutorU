<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../css/default_styles.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
					
				<?php $user = $this->model('User');
				if($user->isTutor()){ ?>
					<h3 style="display:inline"><b>Received requests</b></h3>	 		
					<br/><br/>
					<?php $received_requests = $data['received_requests'] ?>
					<div class="" style="border-bottom: solid 1px black; margin-bottom: 10px">
						<?php 						
							foreach($received_requests as $request){										
								print("
									<div class='card'>
									  <h4 class=''>$request->firstName $request->lastName</h4>			  
									  <div class='card-body'>								    
									    <p class='card-text'>$request->details</p>
									    <p class='card-text'>Requested date: $request->request_date $request->request_time</p>
									    <small>Request made on $request->timestamp</small><br/>
									    <a href='/Request/accept/$request->requestId' class='btn btn-primary'>Accept</a>
									    <a href='' class='btn btn-danger'>Decline</a>
									  </div>
									</div><hr/>");									
								}

							if(count($received_requests) == 0){
							print("<h4>No requests received</h4>");
							}
						?>
					</div>
				<?php }?>
				

				<h3 style="display:inline"><b>Sent requests</b></h3>
				<br/><br/>
				<?php $sent_requests = $data['sent_requests'] ?>
				<div class="">
					<?php 						
						foreach($sent_requests as $request){	
							print("
									<div class='card'>
									  <h4 class=''>$request->firstName $request->lastName</h4>			  
									  <div class='card-body'>								    
									    <p class='card-text'>$request->details</p>
									    <p class='card-text'>Requested date: $request->request_date $request->request_time</p>
									    <small>Request made on $request->timestamp</small><br/>
									    <a href='' class='btn btn-danger'>Cancel</a>								   
									  </div>
									</div><hr/>");
								
						}
						if(count($sent_requests) == 0){
							print("<h4>No requests sent</h4>");
						}
					?>
				</div>
			</div>
	</body>
</html>