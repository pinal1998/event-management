<?php
include"connection.php";
if (isset($_REQUEST['catid'])) {
	$id=$_REQUEST['catid'];
	$sel="select * from catering where cate_id=$id";
	$ex=$con->query($sel);
	$record=$ex->fetch_object();
	//print_r($record);
	$price=$record->cate_price;?>
	<label>Dish Price For 100 Person</label>
	<input type="text" name="person" value="<?php echo $price;?>" id="dish_price">
<?php }


?>