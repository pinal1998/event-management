<?php
include "css.php";
include "header.php";
include"connection.php";
//include "banner.php";
?>

			<div style="margin-top: 15%; margin-bottom: 400%;">
			<center><h1 style="color: orange;font-size: 80px;"><b>PACKAGES</b></h1><br><br>

<?php
		$sel="select * from package join catering on   package.cate_id=catering.cate_id join decoration on package.deco_id=decoration.deco_id join place on package.place_id=place.place_id";
		$ex=$con->query($sel);
		while($record=$ex->fetch_object())
		{
			//print_r($record);  ?>

			<div class=" col-md-3" style=" border: solid grey; margin-left: 5%;" align="center">
			<div class=" col-md-offset-2 col-md-5">
			<img src="admin/upload/<?php echo $record->pack_photo;?>" height=250px width=250px>
				<h1 style="color: red"><?php echo   ucwords($record->pack_name);?></h1>
				<input type="hidden" name="hiddnpackage" value="<?php echo $record->pack_id;?>">
				<h3><label style="color: orange">This price include 200 persion:</label>Rs.<?php echo $record->pack_price;?></h3>
				<h1 style="color: green">Include Items</h1>
				<h2><label style="color: orange">Our Catering:</label><?php echo $record->cate_name;?></h2>
				<h2><label  style="color: orange">Our Decoration:</label><?php echo $record->deco_name;?></h2>
				<h2><label  style="color: orange">Our Place:</label><?php echo $record->place_name;?></h2>
				<!-- -->
				
				  <form method="post" action="login.php">
				<input type="submit" name="" value="Booking Now" class="btn btn-info">
				</form>

			</div>
				
			</div>

		<?php }
	

?>
 
<?php 
//include "footer.php";
?>
