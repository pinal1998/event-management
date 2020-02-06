<?php
include"connection.php";
include"css.php";
include"uheader.php";
$id=$_SESSION['sessionuser'];
$sel="select * from customer where cus_id=$id ";
//echo $sel;exit;
$ex=$con->query($sel);
$record=$ex->fetch_object();
//print_r($record);exit;
if (isset($_REQUEST['edit'])) 
{
	$name=$_REQUEST['Username'];
	$mail=$_REQUEST['mail'];
	$pass=$_REQUEST['Password'];
	$num=$_REQUEST['number'];
	$add=$_REQUEST['address'];
   $up="update customer set cus_name='$name',cus_address='$add',cus_phone_no='$num',cus_email='$mail',cus_password='$pass' where cus_id=$id";
	$upex=$con->query($up);
	if($upex)
	{
		?>
		<script type="text/javascript">
			alert("your Profile Upadted");
			window.location.href="uhome.php";
		</script>
	<?php }
	else
	{
		?>
		<script type="text/javascript">
			alert("your Profile  not updated");
		</script>
	<?php }

}
?>
<div class="content">
				<!--login-->
			<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1" class="" style="margin-top: 300px ; margin-bottom: 50px; margin-left: 30%; margin-right: 30%;">
					<h3 align="center">EDIT PROFILE</h3>
					<form action="#" method="post">
						<div class="key" >
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="<?php echo $record->cus_name;?>" name="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="" class="form-control">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="<?php echo $record->cus_email;?>" name="mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" class="form-control">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="<?php echo $record->cus_password;?>" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="" class="form-control">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="text" value="<?php echo $record->cus_phone_no;?>" name="number"   placeholder="Enter number" required="" class="form-control">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="text" value="<?php echo $record->cus_address;?>" name="address"   placeholder="Enter ur Adderss" required="" class="form-control" >
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="EDIT-Profile" name="edit">
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
		</div>

<?php 
include"footer.php";
?>

