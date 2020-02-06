<!DOCTYPE html>
<html>
<head>
	<title>Event Report</title>
	<link href="css/bootstrap.css" rel='stylsheet' type='text/css'/>

</head>
<body>
     <div class="container">
     <section class="tables-section"></section>
     <div class="outer-w3-agile mt-3">
     <h3>Event booking</h3>

     <div class="col-md-3">
     <div class="form-group">
     <form action="event_report.php" method="post">
     <h4>Date : <?php echo date("Y/m/d");?> </h4>
     </div>
     </div>
     <div class="col-md-12">
     <div class="form-group">
     <div class="table-response">
     <table class="table">
     <thead>
     		<tr>
     			<th>booking id</th>
     			<th>event name</th>
				<th>catering name</th>
				<th>decoration name</th>
				<th>place name</th>
				<th>No Of Person</th>
				<th>Total Of Dish/person</th>
				<th>total</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			$con = mysqli_connect("localhost","root","","grp-22");
			$sql="select * from event";
			$rs=mysqli_query($con,$sql);

			while($row=mysqli_fetch_assoc($rs));
			{
				echo "<tr>"."<td>".$row['e_id']."</td>"."<td>".$row['e_name'];
			}
			?>
			</tbody>
			</table>
			
			</div>
			</div>
			</div>
			</form>
			</div>
			</div>
			</div>
			</div>
			</body>
			</html>


