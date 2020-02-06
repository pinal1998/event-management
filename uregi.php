<?php
include"connection.php";

include"css.php";
include"vheader.php";
if (isset($_REQUEST['insert']))
{  
	$name=$_REQUEST['Username'];
	$mail=$_REQUEST['Email'];
	$num=$_REQUEST['number'];
	$add=$_REQUEST['Address'];
	$pass=$_REQUEST['Password'];
	$ins="insert into customer (cus_name,cus_address,cus_phone_no,cus_email,cus_password) values('$name','$add','$num','$mail','$pass')";
	;
		$ex=$con->query($ins);
		if($ex)
		{ ?>
		<script type="text/javascript">
			alert("U created suuccessfuuly ur account");
			window.location.href="login.php";
		</script>
	<?php	}
	else
	{		?>
		<script type="text/javascript">
			alert("Not success");
			window.location.href="uregi.php";
		</script>
	<?php }
}
?>
<div class=" col-md-offset-3 col-md-6 contact-form"  style="margin-top: 100px;">
				<h4 class="white-w3ls">Registration Form</h4>
				<form  method="post">
					
					
					 	 	 

					 	 
					<div class="styled-input agile-styled-input-top">
						<input type="text" name="Username" required="required">
						<label style="color: white">UserName</label>
						<span></span>
					</div>
					 	 


					<div class="styled-input">
						<input type="Email" name="Email" required="required"> 
						<label style="color: white">Email</label>
						<span></span>
					</div> 	 

					<div class="styled-input">
						<input type="Password" name="Password" required="required" class="form-control" style="background-color: black;  border: none; border-bottom-style: solid; border-bottom-width: thin;"> 
						<label style="color: white">Password</label>
						<span></span>
					</div> 
					

					<div class="styled-input">
						<input type="text" name="Address" required="required"> 
						<label style="color: white">Address</label>
						<span></span>
					</div> 	 
				
				
					
					<div class="styled-input">
						<input type="number" class="form-control" name="number" required="required" style="border:none;
						border-bottom-style: solid; background-color: black; border-bottom-width: thin; border-radius: none;"> 
						<label style="color: white">Contact Number</label>
						<span></span>
					</div> 	 
				
			       <input type="submit" value="SEND" name="insert" >
					<input type="reset" name="" value="Cancel" class="btn btn-danger btn-sm" style="border: none; font-size: 13px;border-radius: 2px;width: 120px;padding: 0.7em 2.5em;outline: none;font-weight: 400;text-transform: uppercase; height: 42.5px;">
				
				</form>
			</div>			
			<?php
			include"footer.php"
			?>