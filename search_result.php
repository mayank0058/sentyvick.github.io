<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<html>
<head>
<style>
	body{
		background-color:powderblue;
		background-size:100% 120%;
	}
	table{
		background-color:white;
	}
	</style>
</head>
<body>

	<div class="search form-group"  style="background-color: #7faf81;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Search result</h3>
		
	</div>
<!-- result -->

					<?php 
					include('config2.php');
					

					$sql = " SELECT * FROM technician WHERE expertise = '" . $_POST["expertise"]."' ";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>id</th>
								<th>username</th>
								<th>Address</th>
								
								<th>Expertise in</th>
								<th>Fee</th>
								<th>email</th>
								<th>contect</th>
								<th>Book</th>
								
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['address']."</td>";
								
								echo "<td>".$row['expertise']."</td>";
								echo "<td>".$row['fee']."</td>";

								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['contect']."</td>";
								
						?>
							<td><a href="booking.php?id=<?php echo $row['id'] ?>">Book</a></td>;
						<?php 		
								
								echo "</tr>";
						}
						echo "</table>";
					} 
					else{
						print "<p align='center'>Sorry, No doctors available</p>";
					}

					?>
					<!-- result -->
<br><br>

	<button style="margin-left: 605px;background-color:;color: antiquewhite;width: 115px;height: 30px;margin-bottom: 5px;">
	<a href="search_doctor.php"><b>Search Again</b></a></button>
	

	
	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 


	
</body>
</html>
