<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$id = $_GET["pid"];
$name = $_GET["p_name"];
$price = $_GET["p_price"];
$quantity = $_GET["p_quantity"];
$desc = $_GET["p_desc"];

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
if($id=="" && $name=="" && $price=="" && $quantity=="" && $desc==""){
  echo '<script>alert("Please Enter the ID and certain blank want to edit")</script>';
}
else{
  if($name != ""){
    $sql = "UPDATE product SET p_name='$name' WHERE pid=$id";
    if($conn->query($sql) === true){
      echo '<script>alert("Item Edit")</script>';
    }
    else{
      echo '<script>alert("Error Editing record")</script>';
    }
  }
  if($price != ""){
    $sql = "UPDATE product SET p_price=$price WHERE pid=$id";
    if($conn->query($sql) === true){
      echo '<script>alert("Item Edited")</script>';
    }
    else{
      echo "Error Editing record";
    }
  }
  if($quantity != ""){
    $sql = "UPDATE product SET p_quantity=$quantity WHERE pid=$id";
    if($conn->query($sql) === true){
      echo '<script>alert("Item Edited")</script>';
    }
    else{
      echo "Error editing record";
    }
  }
  if($desc != ""){
    $sql = "UPDATE product SET p_desc='$desc' WHERE pid=$id";
    if($conn->query($sql) === true){
      echo '<script>alert("Item Edited")</script>';
    }
    else{
      echo "Error editing record";
    }
  }
}
echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/admin.html'>";


$conn->close();

 ?>
