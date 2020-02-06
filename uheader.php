
	<?php
	include "connection.php";
	error_reporting(0);

	session_start();
	

	?>
	<style type="text/css">
		#subul
		{
			display: none;
		}
		#mainul li:hover #subul
		{
			display: block;
		}
		
	</style>
	

	<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							
						</button>
						<h2 ><a class="navbar-brand" href="index.html" style="color: red">Event Management</a></h2>
						<span style="color: white; font-size: 30px;"><?php echo $_SESSION['name'];?></span>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right" id="mainul">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="hvr-sweep-to-right" href="uhome.php" style="margin-left: -200px;">Home</a></li>
							<li><a class="hvr-sweep-to-right" href="about.php" style="margin-left: -50px;">About</a></li>
							<li><a class="hvr-sweep-to-right" href="user_show_event.php">Events</a>
							</li>

							<li class="nav-item">
							<a class="hvr-sweep-to-right" href="user_show_pack.php">package</a>
							</li>

							<li><a class="hvr-sweep-to-right" href="event_booking.php">Events booking</a>
							</li>
							
							<li><a class="hvr-sweep-to-right" href="my_booking.php"> Package booking</a>
							</li>
							
							
							<li class="nav-item">
							<a class="hvr-sweep-to-right" href="event_payment.php">Event Payment</a>
							</li>
							<li class="nav-item">
							<a class="hvr-sweep-to-right" href="pack_payment.php">Package Payment</a>
							</li>

							<li><a class="hvr-sweep-to-right" href="feedback.php">Feedback</a></li>
						
							<li><a class="hvr-sweep-to-right" href="edit_profile.php">Edit Profile</a></li>
							<li><a class="hvr-sweep-to-right" href="logout.php">Log Out</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->