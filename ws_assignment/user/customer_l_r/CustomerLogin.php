
<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = mysqli_connect($db_server, $db_user, $db_pass) or die("error Connection");
$selectdb = mysqli_select_db($conn, $db_name) or die(("Error Database"));

session_start();
if (isset($_SESSION['cid'])){
  echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/Homepage/Homepage.php'>";
}
else{
if (isset($_POST["login-submit"])){
  $name = $_POST['name'];
  $pass = $_POST['pass'];
  if (empty($_POST[$name]) || empty($_POST[$pass])){
     $selectdb = mysqli_query($conn, "SELECT * FROM customer WHERE c_name = '$name' AND c_pass = '$pass'");
     $row = mysqli_fetch_array($selectdb);
     if ($row["c_name"] == $name && $row["c_pass"] == $pass){
       setcookie('cid',$row[c_id],time()+(3600*24));
       setcookie('login',1,time()+(3600*24));
       $_SESSION['cid'] = $row[c_id];

       echo '<script>alert("Welcome!")</script>';
       echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/Homepage/Homepage.php'>";
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
	<link href="CustomerLoginPage1.css" type="text/css" rel="stylesheet">
	<title>Customer Login Page</title>
	</head>

	<body>
		<div class="container-fluid bg">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-4 col-sm-4 col-xs-12">
				<!--Form Start Here-->


					<form class="form-conatiner" action="CustomerLogin.php" method="post">
						<h1>Customer Login Form</h1>
					  <div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" name="name" placeholder="User" required>
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
					  </div>
					  <div class="form">
						  <label for="RegisterHere">Not a member? <a href="http://localhost/ws_assignment/user/customer_l_r/CustomerRegister.php">Register Here</a></label>
						  <label for="AdminLoginHere">Login as admin? <a href="http://localhost/ws_assignment/user/admin/AdminLogin.php">Log in Here</a></label>
					  </div>
						<br>
					  <button type="submit" name="login-submit" class="btn btn-success btn-block">Submit</button>
					  <button type="submit" name="backhome-submit" class="btn btn-success btn-block"><a href="http://localhost/ws_assignment/user/Homepage/Homepage.php" style="color: white">Back to homepage</a></button>
					</form>

				<!--Form End Here-->
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
			</div>
		</div>
	</body>
</html>
<?php } ?>
