<?php
//Connecting to DB
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ws_a";
$payment = 0;

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if(isset($_COOKIE["login"])){
  $login = $_COOKIE["login"];
}else{
  $login = 0;
}
session_start();
$key = $_SESSION["cid"];
$sql = "SELECT * FROM cart WHERE c_id='$key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {?>
    <table id="myTable"><tr><th>Cart ID</th><th>Name</th><th>Price</th><th>Quantity</th></tr><?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ca_id"]. "</td><td>" . $row["ca_name"]. "</td><td>" . $row["ca_price"]. "</td><td>".$row["ca_amount"]."</td></tr>";
        $total = $row["ca_price"] * $row["ca_amount"];
        $payment += $total;
    }
    echo "</table>";
    echo "<BR>total RM".$payment;
    echo "<p><BR><font color=white size='4pt'>total RM $payment</font></p>";
} else {
    echo "0 results";
}



 ?>
