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
		background-image:url('img/image1.jpg');
		background-size:100% 100%;
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
	  
	  <li class="nav-item active">
        <a class="nav-link" href="Search_doctor.php"><b>Search doctor</b><span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item">
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
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>
<br><br>
<br><br><br><br>
<br>
		 <div class="formstyle" style="padding:70px;border: 1px solid lightgrey;margin-right: 283px;margin-bottom: 30px;background-color:gray;color:#141313;width: 530px;margin-left: 500px;">
					
			<form action="search_result.php" method="post" class="form-group">
				<label>
						<b> Category: </b> <select name="expertise" type="text" style="width: 110px;margin-right: 190px;" />
												<option><b>-Select-	</b></option>
												<option><b>Medicine</b></option>
												<option><b>Heart</b></option>
												<option><b>Bone</b></option>
												<option><b>Neurologist</b></option>
												<option><b>kedney</b></option>
												<option><b>Cardiologist</b></option>
												<option><b>Plastic Surgeon</b></option>
												<option><b>General Physician</b></option>
											</select>

					</label>
					<button name="submit" type="submit" style="border-radius: 3px;color:#000;margin-left: 145px;margin-top: 8px;"><b>Search</b></button>
					<br>
					
			</form>
</div>
	</div>
	
	

	
 


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>




</body>
</html>