<?php
require_once "config2.php";

$username = $password = $confirm_password = $address = $fee = $email = $contect ="";
$username_err = $password_err = $confirm_password_err = $address_err = $fee_err = $email_err = $contect_err ="";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
		echo "<script type='text/javascript'>alert('$username_err');</script>";
    }
    else{
        $sql = "SELECT id FROM technician WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            //Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
					echo "<script type='text/javascript'>alert('$username_err');</script>";

                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
	    $password_err = "Password cannot be blank";
		echo "<script type='text/javascript'>alert('$password_err');</script>";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
	echo "<script type='text/javascript'>alert('$password_err');</script>";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
	echo "<script type='text/javascript'>alert('$password_err');</script>";

}

if(empty(trim($_POST['address']))){
	    $address_err = "address cannot be blank";
		echo "<script type='text/javascript'>alert('$address_err');</script>";
}
else{
	$address = trim($_POST['address']);
}

if(empty(trim($_POST['expertise']))){
	    $expertise_err = "Expertise cannot be blank";
		echo "<script type='text/javascript'>alert('$expertise_err');</script>";
}
else{
	$expertise = trim($_POST['expertise']);
}

if(empty(trim($_POST['fee']))){
	    $fee_err = "fee cannot be blank";
		echo "<script type='text/javascript'>alert('$fee_err');</script>";
}
else{
	$fee = trim($_POST['fee']);
}	

//check for email
if(empty(trim($_POST['email']))){
    $email_err = "email cannot be blank";
		echo "<script type='text/javascript'>alert('$email_err');</script>";

}
else{
    $email = trim($_POST['email']);
}

//check for contect
if(empty(trim($_POST['contect']))){
    $contect_err = "contect cannot be blank";
		echo "<script type='text/javascript'>alert('$contect_err');</script>";

}
else{
    $contect = trim($_POST['contect']);
}



// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($expertise_err) && empty($email_err) && empty($contect_err) && empty($fee_err))
{
    $sql = "INSERT INTO technician (username, password, address, expertise, fee, email, contect) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $param_address, $param_expertise, $param_fee, $param_email, $param_contect);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
		$param_address = $address;
		$param_expertise = $expertise;
		$param_fee = $fee;
		$param_email = $email;
		$param_contect = $contect;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
			
			 $msg = "added successfuly";
	          echo "<script type='text/javascript'>alert('$msg');</script>";		
			

        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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

    <title>ADD TECHNICIAN</title>
  </head>
  <body style="background-color:powderblue;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <font color='orange'><b>TECHNICIAN RAGISTER</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="t-login.php"><b>Login</b><span class="sr-only">(current)</span></a>
      </li>   
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3><b>Ragister Here:</b></h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4"><b>Username</b></label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4"><b>Password</b></label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4"><b>Confirm Password</b></label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
  <div class="form-group">
    <label for="inputAddress2"><b>Address</b></label>
    <input type="text" class="form-control" name ="address" id="inputAddress2" placeholder="city">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputexpertise"><b>Expertise</b></label>
      <select name="expertise" type="text" class="form-control" >
		<option><b>-Select-</b></option>
        <option><b>Medicine</b></option>
		<option><b>Heart</b></option>
		<option><b>Bone</b></option>
		<option><b>Neurologist</b></option>
		<option><b>kedney</b></option>
		<option><b>Cardiologist</b></option>
		<option><B>Plastic Surgeon</b></option>
        <option><B>General Physician</b></option></b>
	 </select>

    </div>
    <div class="form-group col-md-2">
      <label for="inputfee"><b>Fee</b></label>
 <input type="text" name ="fee" class="form-control" id="inputfee" placeholder="Minimum fee">
  </div>
  
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputemail"><b>Email</b></label>
      <input type="text" name ="email" class="form-control" id="inputemail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputcontect"><b>Contect</b></label>
	   <input type="text" name ="contect" class="form-control" id="inputcontect" placeholder="Contect">
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary"><b>Sign in</b></button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>