<html>
	<head>

		<?php include_once('app/views/Default/stylesheet_links.php') ?>
		<title>iTutorU - Requests</title>
	</head>
	<body>
		<?php include_once('app/views/Default/header.php') ?>

			<div class="content_block">		
				<?php $user = $this->model('User');
				$user->userId = $_SESSION['userId'];
				if($user->isTutor()){ ?>
					<h4 style="display:inline">Received requests</h4>	 		
					<br/><br/>
					<?php $received_requests = $data['received_requests'] ?>
					<div class="" style="border-bottom: solid 1px black; margin-bottom: 10px">
						<?php 						
							foreach($received_requests as $request){	
								if($request->status == 'pending'){					
									print("
										<div class='card'>
										  <h5 class=''><b>$request->firstName $request->lastName</b></h5>			  
										  <div class='card-body'>								    
										    <p class='card-text'>$request->details</p>
										    <p class='card-text'>Requested date: $request->request_date $request->request_time</p>
										    <small>Request made on $request->timestamp</small><br/>
										    <a href='/Request/accept/$request->requestId' class='btn btn-primary'>Accept</a>
										    <a href='/Request/decline/$request->requestId' class='btn btn-danger'>Decline</a>
										  </div>
										</div><hr/>");									
								}								
								else if($request->status == 'cancelled'){		
									print("
										<form action='/Request/_delete' method='post'>
											<div class='card'>
											  <h5 class=''><b>$request->firstName $request->lastName</b></h5>			  
											  <div class='card-body'>
											    <p class='card-text'>This request has been cancelled</p>
											    <small>Request made on $request->timestamp</small><br/>
											    <input name='requestId' value='$request->requestId' hidden />
											   <input type='submit' class='btn btn-warning' value='OK'/>
											  </div>
											</div>
										</form><hr/>");									
								}
							}

							if(count($received_requests) == 0){
							print("<h5>No requests received</h5>");
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
							if($request->status == 'pending'){
								print("
									<form action='/Request/cancel' method='post'>
										<div class='card'>
										  <h5 class=''><b>$request->firstName $request->lastName</b></h5>			  
										  <div class='card-body'>								    
										    <p class='card-text'>$request->details</p>
										    <p class='card-text'>Requested date: $request->request_date $request->request_time</p>
										    <small>Request made on $request->timestamp</small><br/>
										    <input name='requestId' value='$request->requestId' hidden />
										    <input type='submit' class='btn btn-danger' value='Cancel'/>					   
										  </div>
										</div>
									</form><hr/>");
							}
							else if($request->status == 'declined'){
								print("
									<form action='/Request/_delete' method='post'>
										<div class='card'>
										  <h5 class=''><b><i>$request->firstName $request->lastName</i></b></h5>		  
										  <div class='card-body'>	
										    <p class='card-text'><i>This request has been declined</i></p>
										    <small><i>Request made on $request->timestamp</i></small><br/>
										    <input name='requestId' value='$request->requestId' hidden />
										    <input type='submit' class='btn btn-warning' value='OK'/>					   
										  </div>
										</div>
									</form><hr/>");								
							}
						}

						if(count($sent_requests) == 0){
							print("<h5>No requests sent</h5>");
						}
						
					?>
				</div>
			</div>
	</body>
</html>