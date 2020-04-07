<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<!-- result -->
<?php 
	$id = isset($_GET['id'])?$_GET['id']:"";
	
 ?>
				<!-- fetching doctor info -->
					<?php 
					include('config2.php');
					

							$sql="SELECT * FROM technician WHERE id = $id ";

							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row  = $result->fetch_assoc()) {
							        $id   = $row["id"];
							        $username 	= $row["username"];
							        $expertise 	= $row["expertise"];
							        $contect 	= $row["contect"];
							        $fee = $row["fee"];
									 
							    }
							}
							
							$conn->close();

					?>
					<!-- fetching doctor info -->
	<!-- 	booking info-->
	<html>
	<head>
	<style>
	body{
		background-image:url('img/image3.jpg');
		background-size:100% 120%;
	}
	</style>
	</head>
	<body>
		<div class="login" style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Book Appoinment</h3>

			<div class="formstyle" style="float: right; padding:70px;border: 2px solid lightgrey;margin-right:280px; margin-bottom:10px;background-color:#f3f3f8;color:#141313;">
			<div class="container">
				<form action="" method="post" >
					

					<label>
						Dr. Name: <input type="text" name="dname" value="<?php echo $username; ?>" >
					</label><br><br>

 					<label>
						Contect: <input type="text" name="dcontect" value="<?php echo $contect; ?>" />
					</label><br><br>
 					
					<label>
						Category: <input type="text" name="expertise" value="<?php echo $expertise; ?>" >
					</label><br><br>

					<label>
						Fee: <input type="text" name="fee" value="<?php echo $fee; ?>" >
					</label><br><br>
					<label>
						Your Name: <input type="text" name="pname" value="">
					</label><br><br>

 					<label>
						 Contect: <input type="text" name="pcontect" value=""/>
					</label><br><br>
					<label>
						 Email: <input type="email" name="email" value=""/>
					</label><br><br>
 					
					<label>
						 Address: <input type="text" name="address" value="">
					</label><br><br>
					<label>
						 Appointment Date: <input type="date" name="date" value="">
					</label><br><br>
					<label>
						 Time: <select name="time" required>
										<option value="">-select-</option>
										<option value="11.00pm">11.00pm</option>
										<option value="01.00pm">01.00pm</option>
										<option value="03.00pm">03.00pm</option>
										<option value="05.00pm">05.00pm</option>
									</select>
					</label><br><br>
					<label>
						 
					</label>
					<label>
						  <input type="hidden" name="id" value="<?php echo $id; ?>">
					</label><br><br>
					
					<button name="submit" type="submit" style="padding-right:5px;border-radius:3px;margin-right:;">Confirm</button> 
					<a href="search_doctor.php"><button name="button" type="button" style="padding-right:5px;border-radius:3px;margin-right:-150px;">Cancel</button></a> <br>


				</form> <br><br>

			</div>
	   </div>
	
		</div>
				<!-- 	booking info-->

</html>				
			<!-- confirming booking -->
			
					<?php
                     
						include('config2.php');

						if(isset($_POST['submit'])){
							

						$sql = " INSERT INTO booking (dname,id,dcontect,expertise,fee, pname,pcontect,email,address,date,time)
							VALUES ('" . $_POST["dname"] . "','" . $_POST["id"] . "','" . $_POST["dcontect"] . "','" . $_POST["expertise"] . "', '" . $_POST["fee"] . "','" . $_POST["pname"] . "','". $_POST["pcontect"] . "','". $_POST["email"] . "','". $_POST["address"] . "','". $_POST["date"] . "','". $_POST["time"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Your booking has been accepted!');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					?> 

				<!-- confirming booking -->

	
	



	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 


	
</body>
</html>
