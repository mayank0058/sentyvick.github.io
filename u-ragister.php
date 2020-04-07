<?php
require_once "config2.php";

$username = $password = $confirm_password = $email = $address = $contect = "";
$username_err = $password_err = $confirm_password_err = $email_err = $address_err = $contect_err = "" ;

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
		echo "<script type='text/javascript'>alert('$username_err');</script>";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
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


//check for email
if(empty(trim($_POST['email']))){
    $email_err = "email cannot be blank";
		echo "<script type='text/javascript'>alert('$email_err');</script>";

}
else{
    $email = trim($_POST['email']);
}

//check for address
if(empty(trim($_POST['address']))){
    $address_err = "address cannot be blank";
		echo "<script type='text/javascript'>alert('$address_err');</script>";

}
else{
    $address = trim($_POST['address']);
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
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($address_err) && empty($contect_err))
{
    $sql = "INSERT INTO users (username, password, email, address, contect) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_email, $param_address, $param_contect);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
		$param_email = $email;
		$param_address = $address;
		$param_contect = $contect;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {		
	echo "<script type='text/javascript'>alert('added succesfully');</script>";

			
			
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

    <title>USER RAGISTRATION</title>
  </head>
  <body style="background-color:powderblue;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"><font color="orange"><b> USER Ragister</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="u-login.php"><b>Login</b></a>
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
    <input type="text" class="form-control" name ="address" id="inputAddress2" placeholder="City">
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputCity"><b>email</b></label>
      <input type="text" class="form-control" name ="email" id="inputemail" placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState"><b>Contect</b></label>
        <input type="text" class="form-control" name ="contect" id="inputContect" placeholder="Contect">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><b>Sign in</b></button>
</form>
 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>