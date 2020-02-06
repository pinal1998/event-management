<?php
include "css.php";
include "uheader.php";
include"connection.php";
//include "banner.php";
$userid=$_SESSION['sessionuser'];
$sel="select * from ebooking  join event on ebooking.e_id=event.e_id join catering on ebooking.cate_id=catering.cate_id join decoration on ebooking.deco_id=decoration.deco_id join place on ebooking.place_id=place.place_id  where cus_id=$userid";
//echo $sel;exit;
$ex=$con->query($sel);
if(isset($_REQUEST['eventbookingdelete']))
{
	//echo "hello";exit;
	$id=$_REQUEST['eventbookingdelete'];
	$delete="delete from ebooking where booking_id=$id";
	//echo $delete;exit;
	$del=$con->query($delete);
	if($del)
		{?>
	        <script type="text/javascript">
	        alert("remove booking");
	         window.location.href="event_booking.php";
	        </script><?php


	}
	else
	{
		?>
		<script type="text/javascript">
			alert("not deleted");
		</script>
	<?php }
	
}

//print_r($record);
if (isset($_REQUEST['payment']))
{
	$bid=$_REQUEST['hidden_id'];
	$eid=$_REQUEST['e_id'];
	$userid=$_SESSION['sessionuser'];
	$total=$_REQUEST['hidden_total'];
	 $date=$_REQUEST['date'];
	$ins="insert into  payment (cus_id,payment_date,booking_id,e_id,total_amount) values('$userid','$date','$bid','$eid','$total')";
	//echo $ins;exit;
	if($ins)
	{
		?>
		<script type="text/javascript">
			//alert("paid");
			window.location.href="event_payment.php";
		</script>
	<?php }
	else
	{
		?>
		<script type="text/javascript">
			alert("not");
			window.location.href="event_booking.php";
		</script>
	<?php }
}
?>
<form method="post">
<div class="row" style="margin-top: 250px;">
	<div class="col-md-offset-1 col-md-6">
		<table class="table" style="font-size: 26px; background-color: black" border="1">
			<tr>
				<th>Booking Id</th>
				<th>event name</th>
				<th>catering name</th>
				<th>decoration name</th>
				<th>place name</th>
				<th>No Of Person</th>
				<th>Total Of Dish/person</th>
				<th>total</th>
				<th>Action</th>
				
			</tr>
			<?php
				$f=0;
				$total=0;
			while($record=$ex->fetch_object())
			{ //print_r($record);
				?>
				<tr>
					<td><?php echo $record->booking_id;?></td>
					<input type="hidden" name="hidden_id" value="<?php echo $record->booking_id;?>">
					<?php $_SESSION['book_id']=$record->booking_id; ?>
					<td><?php echo $record->e_name;?></td>
						<?php $_SESSION['event_id']=$record->e_id; ?>
					<td><?php echo $record->cate_name;?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $record->cate_price;?>
					</td>
					<td><?php echo $record->deco_name;?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $record->deco_price;?> 
					</td>
					<td><?php echo $record->place_name;?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $record->place_price;?>
					</td>
					<td>
					<?php echo $record->person;?>
					</td>
					<td>
					<?php echo $record->total;?>
					</td>
					<td>
						<?php echo $total=$record->total+$record->deco_price+$record->place_price;?>

					</td>
					
					
					<td>
					<a href="event_booking.php?eventbookingdelete=<?php echo $record->booking_id;?>">CANCEL BOOKING??</a>

				    </td>
				</tr>
				<?php 


			 $final=$final+$record->total+$record->deco_price+$record->place_price;
		}
			?>

			<tr>
			<td colspan="9" align="right"><?php echo $final;?></td>
				<?php 

				$_SESSION['grand_total']=$final;?>
			</tr>
			<tr>

			<tr>
				<td colspan="10" align="right">
				<input type="date" name="date" class="form-control">
					<input type="submit" name="payment" value="Payment" class="btn btn-primary">
				</td>
			</tr>
		</table>
	</div>
</div>
</form>