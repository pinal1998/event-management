<?php
include"css.php";
include"uheader.php";
include"connection.php";
if (isset($_REQUEST['book']))
{
	$pack_id=$_REQUEST['hiddnpackage'];
	$total_person=$_REQUEST['qty_person'];
	$userid=$_SESSION['sessionuser'];
	$fd=$_REQUEST['first_date'];
    $ld=$_REQUEST['second_date'];
   
	
	$ins="insert into booking (cus_id,pack_id,number_of_person,first_date,last_date) values('$userid','$pack_id','$total_person','$fd','$ld')";
	$ex=$con->query($ins);
	if($ex)
	{
		?>
		<script type="text/javascript">
			alert("book");
			window.location.href="my_booking.php";
		</script>
	<?php }
	else
	{
		?>
		<script type="text/javascript">
			alert("not");
			window.location.href="user_show_pack.php";
		</script>
<?php 	}
	
}
?>
    




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row" style="">
	<div class="sufee-login d-flex align-content-center flex-wrap" style="margin-top:300px;margin-left: 10%; margin-right: 10%; background-color: grey">
        <div class="container">
            <div class="login-content" >
                <h1 align="center">ADD BOOKING</h1><br>

                <div class="login-form">
        
		<?php 
		if (isset($_REQUEST['pack_id']))
		 {
			# code...
			$id=$_REQUEST['pack_id'];
		 $sel="select * from package where pack_id=$id";
		$ex=$con->query($sel);
		//print_r($ex);exit;
		$record=$ex->fetch_object();
		//print_r($record);
	}
		?>
			<form method="post" enctype="multipart/form-data" style="margin-top: 100px; margin-left: 150px">
                     <div class="input-group">
                    
					<form>
						<input type="text" name="pack_name" value="<?php echo $record->pack_name;?>" class="form-control"><?php echo $recode->pack_name;?>
						<input type="hidden" name="hiddnpackage" value="<?php echo $record->pack_id;?>">
						<br>
						<br>
						<br>
					<div class="input-group">
                    <label>Starting Date</label>
                        <input type="date" name="first_date" class="form-control">
                    </div> 

                    <div class="input-group">
                    <label>Ending Date</label>
                        <input type="date" name="second_date" class="form-control">
                    </div>    
                       
                    
						<br>
				
				<input type="text" name="qty_person" class="form-control" placeholder="enter ur total person" style="margin-bottom: 20px">
				
						

						<br>
						<input type="submit" class="btn btn-info" value="Booking" name="book">
							</form>
			</div>
	</div>

</body>
</html>