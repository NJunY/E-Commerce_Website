<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = mysqli_connect($db_server, $db_user, $db_pass) or die("error Connection");
$selectdb = mysqli_select_db($conn, $db_name) or die(("Error Database"));

if (isset($_POST["login-submit"])){
  $name = $_POST['Name'];
  $pass = $_POST['Pass'];
  if (empty($_POST[$name]) || empty($_POST[$pass])){
     $selectdb = mysqli_query($conn, "SELECT * FROM admin WHERE AdminID = '$name' AND AdminPassword = '$pass'");
     $row = mysqli_fetch_array($selectdb);
     if ($row["AdminID"] == $name && $row["AdminPassword"] == $pass){
       echo '<script>alert("Welcome!")</script>';
       echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/admin.html'>";
     }
     else{
       echo '<script>alert("incorrect Information")</script>';
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
	<link href="AdminLoginPage1.css" type="text/css" rel="stylesheet">
	<title>Admin Login Page</title>
	</head>

	<body>
		<div class="container-fluid bg">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-4 col-sm-4 col-xs-12">
				<!--Form Start Here-->


					<form class="form-conatiner" action="AdminLogin.php" method="post">
						<h1>Admin Login Form</h1>
					  <div class="form-group">
						<label for="exampleInputEmail1">Admin ID</label>
						<input type="text" class="form-control" name="Name" placeholder="Enter ID">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="Pass" placeholder="Enter Password">
					  </div>
		<!------	  <div class="form">
						  <label for="RegisterHere">Not a admin? <a href="AdminRegisterPage.php">Register Here</a></label>
					  </div>   ----->
						<br>
					  <button type="submit" name="login-submit" class="btn btn-success btn-block">Submit</button>
					  <button type="submit" name="backhome-submit" class="btn btn-success btn-block"><a href="http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php" style="color: white">Back to customer form</a></button>
					</form>

				<!--Form End Here-->
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
			</div>
		</div>
	</body>
</html>
