<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: u-login.php");
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

    <title>USER login</title>
	
  <style>
  body {
	  background-image: url('img/6.jpg');
	    background-size: 100% 150%;
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
      <li class="nav-item active">
        <a class="nav-link" href=""><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="Search_doctor.php"><b>Search doctor</b></a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="view_booking.php"><b>View Apointment</b></a>
      </li
	  
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
<br><br><br>
<div class="container mt-4">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><h3><center><font size="30px" color="orange"><?php echo "Welcome ". $_SESSION['username']?></font></center></h3>
<hr>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>









