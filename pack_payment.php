<?php
include"css.php";
include"uheader.php";
include"connection.php";
$id=$_SESSION['sessionuser'];
$sel="select * from booking where booking_id=$id";
$ex=$con->query($sel);
$reco=$ex->fetch_object();
//print_r($reco);
if (isset($_REQUEST['pack_payment'])) 
{
	
	$user_id= $_SESSION['sessionuser'];
	$pack_id=$_SESSION['pack_id'];
	$book_id=$_SESSION['book_id'];
	$total=$_SESSION['grand_total'];
	$date=$_REQUEST['payment_date'];
	$card_num=$_REQUEST['cardnumber'];
	$crd_cvv=$_REQUEST['cvv'];
	$method=$_REQUEST['payment_method'];
	if($method=="Credit Card" || $method=="Debit card")
	{
		$ins="insert into pack_payment (pack_id,cust_id,payment_date,booking_id,Total_amount	,payment_method,card_number,cvv,status) values ('$pack_id','$user_id','$date','$book_id','$total','$method','$card_num','$crd_cvv','paid')";

	}
	else
	{
		$ins="insert into pack_payment (pack_id,cust_id,payment_date,booking_id,Total_amount	,payment_method,status) values ('$pack_id','$user_id','$date','$book_id','$total','$method','pending')";

	}
	//echo $ins;exit;
	$ex=$con->query($ins);
	if($ex)
	{
		//echo "<script> alert('Payment successfully paid'); </script>"
		?>
		<script type="text/javascript">
			alert("payment success");
		</script>
	<?php }
	else
	{
		?>
		<script type="text/javascript">
			alert("not Payment");
		</script>
	<?php }
	
}
?>
<script type="text/javascript">
	function getdata(str)
	{
		//alert(str);
		if(str=="Cash on Delivery")
		{
			//alert();
			document.getElementById('card_number').style.display="none";
			document.getElementById('card_cvv').style.display="none";
			document.getElementById("card_date").style.display="none";
		}
		else
		{
			document.getElementById('card_number').style.display="block";
			document.getElementById('card_cvv').style.display="block";
			document.getElementById("card_date").style.display="block";

		}

	}
	
</script>
<center>
	<div style=" position: absolute; top: 230px; left: 250px" >
	<form method="post" style=" position: absolute;  left: 250px; width: 500px; background-color: grey"><br>
		<label>Selcet ur payment methods</label>
		<br>
		<select class="form-control" name="payment_method" onchange="getdata(this.value)">
			<option>Choose ur payment</option>
			<option value="Credit Card">Credit Card</option>
			<option value="Debit card">Debit card</option>
			<option value="Cash on Delivery">Cash on Delivery</option>
		</select><br>
		<input type="text" name="cardnumber" class="form-control" placeholder="enter card number" pattern="[0-9]{16}" id="card_number"><br>

		<input type="text" name="cvv" class="form-control" placeholder="cvv number" pattern="[0-9]{3}" id="card_cvv"><br>
			
		<br>
		<br>
		<label>Ur total Payment AMount is</label>
		<br>
		<input type="'text" name="total_amount" value="<?php echo $_SESSION['grand_total'] ;?>" class="form-control">	<input type="hidden" name="booking_id" value="<?php echo $reco->booking_id;?>">
		
		<br>
		<br>
		<label> Ur Payment date</label>
		<input type="date" name="payment_date" class="form-control">
		<br>
		<br>
		<input type="submit" name="pack_payment" value="Payment" class="btn btn-success">
	</form>
</div>
</center>