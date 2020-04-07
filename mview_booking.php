<?php
session_start();
?>

	<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MANAGER</title>
	<style>
	body{
        background-color:powderblue;
		background-size:100% 150%;
	}
	table{
		background-color:lightgray;
	}
	</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png">  <font color="orange" size="">MANAGER</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="m-welcome.php"><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="t-ragister.php"><b>Add Technician</b></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="mview-doctor.php"><b>View Technicians</b></a>
      </li>
	  <li class="nav-item ">
        <a class="nav-link" href="mview_users.php"><b>View Users</b></a>
      </li>
	   <li class="nav-item active">
        <a class="nav-link" href="mview_booking.php"><b>View Bookings</b></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="mview_feedback.php"><b>View Feedback</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="m-logout.php"><b>Logout</b></a>
      </li>

      
         </ul>
		  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <font color="orange"><?php echo "Welcome ". $_SESSION['username']?></font></a>
      </li>
</div>
</div>
</nav>
<br><br>
		
	</div>
		
				<?php 
					include('config2.php');
					

					$sql = " SELECT * FROM booking ";
					$result = mysqli_query($conn,$sql);
					?>
	
					
						<table width="600" border='1' align='center' cellpadding='20' cellspacing=''>
							<tr>
								<th>Booking_Id</th>
								<th>D_Name</th>
								<th>D_Id</th>
								<th>D_Contect</th>
								<th>Expertise</th>
								<th>D_Fee</th>
								<th>P_Name</th>
								<th>P_Contect</th>
								<th>P_Email</th>
								<th>P_Address</th>
								<th>Appointment_Date</th>
								<th>Appointment_Time</th>
							</tr>
							
					<?php
						
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['booking_id']."</td>";
								echo "<td>".$row['dname']."</td>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['dcontect']."</td>";
       							echo "<td>".$row['expertise']."</td>";
								echo "<td>".$row['fee']."</td>";
								echo "<td>".$row['pname']."</td>";
								echo "<td>".$row['pcontect']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['date']."</td>";
								echo "<td>".$row['time']."</td>";

								echo "</tr>";
						}
					?>
								
						
</table>
</body>
</html>	