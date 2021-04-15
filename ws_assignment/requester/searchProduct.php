<?php
  function HttpGet($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  $p_name = $_POST["p_name"];
  $jsonobj = HttpGet("http://localhost/ws_assignment/provider/allProduct.php");
  $obj = json_decode($jsonobj);
  foreach ($obj as $key1 => $value1) {
    // code...
    foreach ($value1 as $key2 => $value2) {

      if($key2 == "p_name" && $value2 == $p_name){
        echo $value2;
      }
    }
  }

 ?>
