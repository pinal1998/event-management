<?php
include "css.php";
include "uheader.php";
include"connection.php";
//include "banner.php";

?>
			<div style="margin-bottom: 100%;margin-top: 15%; padding: 20px">
			<center><h1 style="color:orange; font-size: 80px;"><b>EVENTS</b></h1><br><br>
			<?php
		$sel="select * from event";
		$ex=$con->query($sel);
		while($e=$ex->fetch_object())
		{ $record[]=$e;
			foreach ($record as $value) {
		?>

			<div class=" col-md-3" style=" border: solid grey ;margin-left: 5%;" align="center">
				<img src="admin/upload/<?php echo $value->e_image; ?>" style="margin-top: 15px;" height=250px width=220px align="center" style="border: none;"><br><br>
				<h1 style="color: red"><?php echo  ucwords($value->e_name);?></h1><br>
				<a href="ebook.php?ebid=<?php echo $value->e_id;?>"><button class="btn btn-info">Booking</button></a>
				<br>
				<br>
				
				</div>
		
			
		<?php } }
	

?>
</div>
<br><br>
<?php 
include "footer.php";
?>
