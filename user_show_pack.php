<?php
include "css.php";
include "uheader.php";
include"connection.php";
//include "banner.php";
?>
			
			<div style="margin-top: 15%;">
			<center><h1 style="color: orange;font-size: 80px;"><b>PACKAGES</b></h1><br><br>
<?php
		$sel="select * from package join catering on   package.cate_id=catering.cate_id join decoration on package.deco_id=decoration.deco_id join place on package.place_id=place.place_id";
		$ex=$con->query($sel);
		while($record=$ex->fetch_object())
		{
			//print_r($record);  ?>

			<div class=" col-md-3" style=" border: solid grey; margin-left: 5%;" align="center">
			<img src="admin/upload/<?php echo $record->pack_photo;?>" height=250px width=250px>
				<h1 style="color: red"><?php echo ucwords($record->pack_name);?></h1>
				<input type="hidden" name="hiddnpackage" value="<?php echo $record->pack_id;?>">
				<h3><label style="color: orange">This price include 200 person:</label>Rs.<?php echo $record->pack_price;?></h3>
				<h1 style="color: green">Include Items</h1>
				<h2><label style="color: orange">Our Catering:</label><?php echo $record->cate_name;?></h2>
				<h2><label  style="color: orange">Our Decoration:</label><?php echo $record->deco_name;?></h2>
				<h2><label  style="color: orange">Our Place:</label><?php echo $record->place_name;?></h2>
				<!-- -->
				
				  <a href="book.php?pack_id=<?php echo $record->pack_id;?>">
				<button class="btn btn-info">
				Booking now
				</button>
				</a>
				
			</div>
			</div>


		<?php }
	

?>
 
<?php 
//include "footer.php";
?>
