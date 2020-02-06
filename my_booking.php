<?php
include "css.php";
include "uheader.php";
include"connection.php";
//include "banner.php";
$de="delete from pack_booking where cus_id='$id'";
$dex=$con->query($de);
$userid=$_SESSION['sessionuser'];
$sel="select * from booking join package on booking.pack_id=package.pack_id where cus_id=$userid";
$ex=$con->query($sel);
if(isset($_REQUEST['mybookingdelete']))
{
	//echo "hello";exit;
	$id=$_REQUEST['mybookingdelete'];
    $delete="delete from booking where booking_id=$id";
	//echo $delete;exit;
	$del=$con->query($delete);
	if($del)
		{?>
	        <script type="text/javascript">
	        alert("remove booking");
	         window.location.href="my_booking.php";
	        </script><?php


	}
	
}
?>
<form method="post" action="pack_payment.php">
<div class="row" style="margin-top: 250px;">
	<div class="col-md-offset-3 col-md-6">
		<table class="table" style="font-size: 26px; background-color: black";  border="1">
			<tr>
				<th>Booking Id</th>
				<th>Booking Package</th>
				<th>Booking Price</th>
				<th>Total Person</th>
				<th>Grand Total</th>
				<th>Action</th>
			</tr>
			<?php
			$f=0;
			while($record=$ex->fetch_object())
			{
				?>
				<tr>
					<td><?php echo $record->booking_id;?></td>
					<input type="hidden" name="hidden_id" value="<?php echo $record->booking_id;?>">
					<?php $_SESSION['book_id']=$record->booking_id; ?>
					<td><?php echo $record->pack_name;?></td> 
					<td><?php echo $record->pack_price;?></td>
					<td><?php echo $record->number_of_person;?></td>
					<td><?php echo $total=$record->pack_price*$record->number_of_person;?></td>
					<input type="hidden" name="hidden_total" value="<?php echo $total=$record->pack_price*$record->number_of_person;?>">
					<td>
					<a href="my_booking.php?mybookingdelete=<?php echo $record->booking_id;?>">CANCEL BOOKING??</a>

				    </td>
				 
			
				</tr>

			<?php 

				$packs[]=$record->pack_name;
				$final=$final+$record->pack_price*$record->number_of_person;

						
		}
			?>
			<tr>
				<?php
						//print_r($packs);
						$p=implode(",", $packs);
						//echo $p;exit;
					   $_SESSION['pack_id']=$p; ?>
				
			<td colspan="6" align="right"><?php echo $final;?></td>
				<?php 

				$_SESSION['grand_total']=$final;?>
			</tr>
			<tr>
				 
			
				<td colspan="7" align="right">
				<input type="date" name="date" class="form-control">
				<input type="submit" name="" value="Go For Payment" class="btn btn-info">
				</td>
			</tr>
		</table>
	</div></form>
