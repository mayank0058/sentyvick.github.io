<?php if(!isset($_SESSION)){
	session_start();
	}  
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>technician login</title>
	
  <style>
  body {
	  background-color:powderblue;
	    background-size: 100% 100%;
  }
  table{
	  background-color:lightgray;
  }
  
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <font color="orange">TECHNICIAN</font></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="t-welcome.php"><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="tview_appointment.php"><b>View Apointment</b></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="t-logout.php"><b>Logout</b></a>
      </li>

      
     
    </ul>
	</div>
	</nav>
	<br><br>

		
	</div>
		
			<div class="all_user" style="margin-top:0px; margin-left: 40px;">
				<?php 
					include('config2.php');

					$sql = " SELECT * FROM booking WHERE dname='".$_SESSION["username"]."'";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>Patient Name</th>
								<th>Contect</th>
								<th>E-mail</th>
								<th>address</th>
								<th>Date</th>
								<th>Time</th>
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['pname']."</td>";
								echo "<td>".$row['pcontect']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['date']."</td>";
								echo "<td>".$row['time']."</td>";
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
					}

					?>
			</div>
		

	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
			



	
</body>
</html>
