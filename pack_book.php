<?php
include"uheader.php";
include"connection.php";
include"css.php";
if (isset($_REQUEST['pid']))
{
	$id=$_REQUEST['pid'];
	$sel="select * from package where pack_id=$id";
	$ex=$con->query($sel);
	$record=$ex->fetch_object();
	//print_r($record);
}
?>
<div class=" col-md-offset-3 col-md-6 contact-form"  style="margin-top: 150px; margin-bottom: 150px; background-color: grey; ">
				<h4 class="white-w3ls"> Book here</h4>
				<form  method="post">

					<div class="styled-input" style="color: white">
						Package Name :
						<input type="text" class="form-control" placeholder="package name"  value=" <?php echo $record->pack_name;?>" style="color:white">
						
						<span></span>
					</div>
					
					<div class="styled-input" style="color: white">
						package Price :
						<input type="text" class="form-control" placeholder="package price" value="<?php echo $record->pack_price;?>" >
					</div>

						<div class="styled-input" style="color: white">
						Our catering :
						<input type="text" class="form-control" placeholder="catering name" value="<?php echo $record->cate_name;?>" >
					</div>
					<div class="styled-input" style="color: white">
						Booking Date :
						<input type="date" class="form-control" >
						
						<span></span>
					</div>
					

					<input type="submit" value="Book" name="pack_book" class="btn btn-success" style="border: none; font-size: 13px;border-radius: 2px;width: 120px;padding: 0.7em 2.5em;outline: none;font-weight: 400;text-transform: uppercase; height: 42.5px;">					
			
				</form>
			</div>
<?php
include"footer.php";
?> 