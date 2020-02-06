<?php
error_reporting(0);
session_start();
include"connection.php";
include "css.php";
include"header.php";

if (isset($_REQUEST['login'])) 
{
	$mail=$_REQUEST['cus_email'];
	$pass=$_REQUEST['cus_password'];
	$sel="select * from customer where cus_email='$mail' and cus_password='$pass'";
	$ex=$con->query($sel);
	//print_r($ex);exit;
	$record=$ex->fetch_object();
	if($ex->num_rows>0)
	{
		 $_SESSION['name']=$record->cus_name;
		 $_SESSION['sessionuser']=$record->cus_id;
		?>
		<script type="text/javascript">
			alert("login succesfull");
			window.location.href="uhome.php";
		</script>
	<?php 
	 
		
	 }
	else
	{
		?>
		<script type="text/javascript">
			alert("Check your Email & Password try again");
		</script>
	<?php }
}
?>

<div class="content">
				<!-3-login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile" style="margin-top: 150px;
					margin-left: 450px; margin-bottom: 250px">
						<h3>Login To Event Management</h3>
						<form action="#" method="post">
							<div class=" col-md-6">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="text" value="email" name="cus_email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" required="" class="form-control">
								<div class="clearfix"></div>
			
								<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="password"  required="" name="cus_password" class="form-control" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" required="">
								<div class="clearfix"></div>
							<br>
							<br>
							<input type="submit" value="Login" name="login" class=" btn btn-info btn-block" style="text-align: center;font-size:14px;">
						</form>
					
					<br>
					<div class="forg">

						<a href="#" class="forg-left">Forgot Password</a>
						<a href="uregi.php" class="forg-right">Register</a>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<!--login-->
		</div>
<?php 
include"footer.php";
?>