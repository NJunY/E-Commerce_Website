<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";
$key = $_GET['pid'];

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if($key==""){
  echo '<script>alert("Please Enter the Product ID")</script>';
}
else{
  $sql = "DELETE FROM product WHERE pid='$key'";

  if($conn->query($sql) === true){
    echo '<script>alert("Product Deleted")</script>';
  }
  else{
    echo "Error deleting record";
  }
}

echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/admin.html'>";

$conn->close();

 ?>
