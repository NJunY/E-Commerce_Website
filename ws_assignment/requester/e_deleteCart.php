<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

$ca_id = $_GET["caid"];

if(isset($_GET["d_submit"])){
  if(empty($ca_id)){
    echo "Please enter the id";
  }else{
    $delete = mysqli_query($conn,"DELETE FROM cart WHERE ca_id='$ca_id'");
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/cart.php'>";
  }
}

 ?>
