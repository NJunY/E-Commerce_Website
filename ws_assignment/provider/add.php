<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$name = $_GET["p_name"];
$price = $_GET["p_price"];
$quantity = $_GET["p_quantity"];
$desc = $_GET["p_desc"];

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
if($name=="" || $price=="" || $quantity=="" || $desc==""){
  echo '<script>alert("Please Fill in all the blank except Product ID")</script>';
}else {
  $sql = "INSERT INTO product(p_name, p_price, p_desc, p_quantity) VALUES ('$name','$price','$desc','$quantity')";

  if($conn->query($sql) === true){
    echo '<script>alert("Item Added")</script>';
  }
  else{
    echo "Error adding record";
  }
}

echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/admin.html'>";

$conn->close();

 ?>
