<?php session_start();  ?>

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
		background-color:white;
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
	  
      <li class="nav-item ">
        <a class="nav-link" href="view_booking.php"><b>View Apointment</b></a>
      </li>
	  <li class="nav-item active">
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




			<div class="formstyle" style="float: ;padding:20px;border: 1px solid lightgrey;margin-right:400px; margin-left:250px;margin-bottom:20px;margin-top:150px;background-color:darkgray;color:#141313;">
				<form action="" method="post" class="text-center form-group">
					<label><br>
						<span> <b>Feedback:</b>  </span><textarea name="feedback" id="" cols="60" rows="5" required></textarea>
					</label><br><br>
					
					<button name="submit" type="submit" style="margin-left: -5px;width: 85px;border-radius: 3px;"><b>Send</b></button> <br>

					


					<!-- login validation -->
			<?php 
					
							include('config2.php');
							if(isset($_POST['submit'])){
							

							$sql = "INSERT INTO feedback (pname,feedback)	VALUES ('" . $_SESSION["username"] ."','" . $_POST["feedback"] ."')";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Thanks for your feedback!');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					
 			?>
		<!-- login validation End-->


				</form> <br>&nbsp;&nbsp;&nbsp;
				
				<br>

				
		
				
			
		
	</div>
	
	
</div>


</body>
</html>
