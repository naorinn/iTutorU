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