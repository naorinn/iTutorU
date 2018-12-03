<header class="main">
	<!--header left-->
	<a href="/User/home"><img src="/images/logo1.png" /></a> 
	

	<!--header middle-->
	<form method="get" action="/Tutor/search" style="display: inline">
		<span id="search_bar">
			<input type="search" name="search" placeholder="Search tutors by subject..." />
			<button>Search</button>
		</span>
	</form>

	<!--W3Schools drop down-->
	<span class="dropdown">
	  	<button style="" class="dropbtn"><i class="fas fa-bars"></i></button>
	  	<span class="dropdown-content">
		    <a href="/User/home">Home</a>
			<!--<a href="/Profile/edit">Profile</a>-->
			<a href="/Profile/index">Profile</a>
			<?php 
				$user = $this->model('User');
				if(!$user->isTutor()){
					print("<a href='/Tutor/create'>Become a tutor</a>");
				}
			
				print("<a href='/Request/index'>View requests</a>");
			
			?>

			<a href="/Notes/index">My notes</a>
			<!--<a href="/Session/hom">My sessions</a>-->
			<a href="/Thread/index">Messages</a>
			<a href="/Resources/index">Resources</a>
			
			<a class="" type="submit" href="/User/logout"><strong>Logout</strong></a>
	  	</span>
	</span>
</header>
<!--image should redirect to home-->