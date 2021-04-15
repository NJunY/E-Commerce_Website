<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

$ca_id = $_GET["caid"];
$ca_amount = $_GET["amount"];


if(isset($_GET["e_submit"])){
  if(empty($ca_id)){
    echo "Please enter the id";
  }else{
    $delete = mysqli_query($conn,"UPDATE cart SET ca_amount=$ca_amount WHERE ca_id='$ca_id'");
  }
}
echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/cart.php'>";
 ?>
