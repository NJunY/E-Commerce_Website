<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
if($result->num_rows > 0){
  $products = array();
  while ($row = $result->fetch_assoc()) {
    foreach($row as $key => $value){
      $products[$row["pid"]][$key] = $value;
    }
  }
}
else{
  echo "No records found";
}

echo json_encode($products);

 ?>
