<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: u-welcome.php");
    exit;
}
require_once "config2.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
		echo "<script type='text/javascript'>alert('$err');</script>";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: u-welcome.php");
                            
                        }
					}
					
                }
				 else{
					$msg="Please enter valid Username or Password";
				   echo "<script type='text/javascript'>alert('$msg');</script>";
				}
				
    }
}
}    




?>




<html>
<head>	
<title>USER LOGIN</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>



<body style="background-color:powderblue;">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <font color='orange'><b>USER Login</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><b>Home </b><span class="sr-only"></span></a>
      </li>
	  <li class="navbar-item">
	  <a class="nav-link" href="u-ragister.php"><b>Ragister</b></a>
	  </li>
  </ul>
  </div>
</nav>

<div class="container">

<form class=mt-5  action="" method="post" target="_blank">
<h3 class=mb-4><b>login here:</b></h3>
<div class=col-md-6>
  <div class="form-group" >
    <label for="exampleInputname"><b>Username</b></label>
    <input type="text" name="username" class="form-control" id="exampleInputname" aria-describedby="" placeholder="Username">
   
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Password</b></label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
 <div class="row">
  <div class="form group col-md-9 mt-4">
  <button type="submit" class="btn btn-primary"><b>Login</b></button>
    </div>
 </div>
</form>
</div>
</body>
</html>