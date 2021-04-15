<?php
  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "ws_a";

  $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $id = $_GET["pid"];
  $p_amount = $_GET["amount"];

  $sql = "SELECT p_quantity FROM product WHERE pid=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $qty_available = $row["p_quantity"];

  $newQty = $qty_available - $p_amount;

  if($newQty > -1){
    $sql = "UPDATE product SET p_quantity = p_quantity-$p_amount WHERE pid = $id";
    if ($conn->query($sql) === TRUE){

    }else{
      echo "Error updating ";
    }
  }else{
    echo "Error. Not enough stock";
  }
echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/cart.php'>";

 ?>
