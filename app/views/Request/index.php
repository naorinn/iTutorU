<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">		
				<?php $user = $this->model('User');
				if($user->isTutor()){ ?>
					<h4 style="display:inline">Received requests</h4>	 		
					<br/><br/>
					<?php $received_requests = $data['received_requests'] ?>
					<div class="" style="border-bottom: solid 1px black; margin-bottom: 10px">
						<?php 						
							foreach($received_requests as $request){										
								print("
									<div class='card'>
									  <h5 class=''><b>$request->firstName $request->lastName</b></h5>			  
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
				

				<h4 style="display:inline">Sent requests</h4>
				<br/><br/>
				<?php $sent_requests = $data['sent_requests'] ?>
				<div class="">
					<?php 						
						foreach($sent_requests as $request){	
							print("
									<div class='card'>
									  <h5 class=''><b>$request->firstName $request->lastName</b></h5>			  
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