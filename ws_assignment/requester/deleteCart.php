<?php
  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "ws_a";
  session_start();
  $key = $_SESSION["cid"];

  function httpGet($url){
  	$ch = curl_init();
  	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  	$output = curl_exec($ch);
  	curl_close($ch);
  	return $output;
  }

  $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

  if($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);
  }

  $sql = "SELECT * FROM cart WHERE c_id='$key'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $cart = array();
    while ($row = $result -> fetch_assoc()){
      foreach ($row as $key => $value) {
        $cart[$row["ca_id"]][$key] = $value;
      }
    }
    $cart_e = json_encode($cart);
    $cart_d = json_decode($cart_e);
    foreach($cart_d as $key1 => $value1){
      foreach($value1 as $key2 => $value2){
        if ($key2 == "ca_id"){
          $caid = $value2;
        }
        elseif ($key2 == "ca_amount"){
          $amount = $value2;
        }
        elseif ($key2 == "pid"){
          $pid = $value2;
        }
      }
      $p_id;
      $get_quantity = httpGet("http://localhost/ws_assignment/provider/allProduct.php");
      $obj = json_decode($get_quantity, true);
      $quantity =  $obj[$pid]["p_quantity"];

      if($quantity < $amount){
        echo "Not enough stock";
      }
      else{
        $setQty = httpGet("http://localhost/ws_assignment/provider/setQty.php?pid=".$pid."&amount=".$amount);
        echo $setQty;
        $ca_sql = "DELETE FROM cart WHERE ca_id='$caid'";
        if($conn->query($ca_sql) === TRUE){

        }
        else{
          echo "Error in deleting record: ".$conn->error;
        }
      }
    }
  }else{
    echo "No records found";
  }

  $conn->close();
 ?>
