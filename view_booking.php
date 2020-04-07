<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	body{
		background-color:powderblue;
		background-size:100% 120%;
	}
	table{
		background-color:lightgray;
	}
	</style>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"><font color="orange">USER</font></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="u-welcome.php"><b>Home </b></a>
      </li>
	  
	  <li class="nav-item ">
        <a class="nav-link" href="Search_doctor.php"><b>Search doctor</b><span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item active">
        <a class="nav-link" href="view_booking.php"><b>View Apointment</b></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="feedback.php"><b>Feedback</b></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="u-logout.php"><b>Logout</b></a>
      </li>

      
   

    </ul>
	  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <font color="orange"><?php echo "Welcome ". $_SESSION['username']?></font></a>
      </li>
  </ul>
  </div>

</div>
</nav>
<br>





	
	</div>
		
			<div class="all_user" style="margin-top:0px; margin-left: 40px;">
				<?php 
					include('config2.php');
					

					$sql = " SELECT * FROM booking WHERE pname = '".$_SESSION["username"]."'  ";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>My Disease Type</th>
								<th>My Doctor</th>
								<th>Appoinment Date</th>
								<th>Time</th>
								<th>Action</th>
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['expertise']."</td>";
								echo "<td>".$row['dname']."</td>";
								echo "<td>".$row['date']."</td>";
								echo "<td>".$row['time']."</td>";
						?>
								<td><a href="cancel_booking.php?date=<?php echo $row['date'] ?>" onclick='return checkdelete()'>Cancel</a></td>;
						<?php	
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, you have no appointment</p>";
					}

					?>

					<!-- Cancel Booking -->


			<?php
							include('config2.php');
							if(isset($_POST['submit'])){
							
							// sql to delete a record
							$sql = "DELETE * FROM booking ";

							if (mysqli_query($conn, $sql)) {
							    echo "<script>alert('Your booking has been Canceled!');</script>";
							} else {
							     echo "<script>alert('There was an Error')<script>";
							}

							mysqli_close($conn);
						}
					?> 


<script>
function checkdelete()
{
   return confirm('are you sure you want to cancel booking ?');
}
</script>
	<!-- Cancel Booking End-->
			</div>
		
	
	
	

	


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
			



	
</body>
</html>
