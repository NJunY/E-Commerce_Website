<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = mysqli_connect($db_server, $db_user, $db_pass) or die("error Connection");
$selectdb = mysqli_select_db($conn, $db_name) or die(("Error Database"));

if (isset($_POST["signup-submit"])){
  $name = $_POST["name"];
  $pass = $_POST["pass"];
  $repass = $_POST["repass"];
  if (empty($name) || empty($pass) || empty($repass)){
    echo '<script>alert("Please Fill in All Blanks")</script>';
  }
  else{
    if($pass == $repass){
      $insert = mysqli_query($conn, "INSERT INTO `customer` (`c_id`, `c_name`, `c_pass`) VALUES (NULL, '$name', '$pass');");
      echo '<script>alert("User Added Successful")</script>';
      echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php'>";
    }
    else{
      echo '<script>alert("Password and Re-Password Are NOT THE SAME")</script>';
    }
  }
}


 ?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href="CustomerLoginPage1.css" type="text/css" rel="stylesheet">
	<title>Customer Register Page</title>
	</head>

	<body>
		<div class="container-fluid bg">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-4 col-sm-4 col-xs-12">
				<!--Form Start Here-->


					<form class="form-conatiner" action="CustomerRegister.php" method="post">
						<h1>Customer Register Form</h1>
					  <div class="form-group">
						<label for="exampleInputUsername1">Username</label>
						<input type="username" class="form-control" name="name" placeholder="Enter Username" required>
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
					  </div>
					  <div class="form-group">
						<label for="exampleInputRepeatPassword1">Repeat Password</label>
						<input type="repeat-password" class="form-control" name="repass" placeholder="Enter Repeat Password" required>
					  </div>
					  <div class="form">
						  <label for="RegisterHere">Already have a account? <a href="http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php">Log In Here</a></label>
					  </div>
						<br>
					  <button type="submit" name="signup-submit" class="btn btn-success btn-block">Submit</button>
					  <button type="submit" name="backhome-submit" class="btn btn-success btn-block"><a href="http://localhost/ws_assignment/user/Homepage/Homepage.php" style="color: white">Back to homepage</a></button>
					</form>

				<!--Form End Here-->
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
			</div>
		</div>
	</body>
</html>
