<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php
 include('config2.php');
 
	$date = isset($_GET['date'])?$_GET['date']:"";


		
				
							
							
							// sql to delete a record
							$sql = "DELETE FROM booking where date = '$date'";

							$data=mysqli_query($conn, $sql);
							if($data)
							{
							    echo "<script>alert('Your booking has been Canceled!');</script>";
							} else {
							     echo "<script>alert('There was an Error')<script>";
							}

						
 			?>
		