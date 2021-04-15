<?php

  function HttpGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  if(isset($_POST["addProduct"])){
    $record = $_POST;
    $url = "http://localhost/ws_assignment/provider/add.php";
    $finalurl = $url."?".http_build_query($record);
    $result = HttpGet($finalurl);
    echo $result;
  }

  if(isset($_POST["deleteProduct"])){
    $record = $_POST;
    $url = "http://localhost/ws_assignment/provider/delete.php";
    $finalurl = $url."?".http_build_query($record);
    $result = HttpGet($finalurl);
    echo $result;
  }

  if(isset($_POST["editProduct"])){
    $record = $_POST;
    $url = "http://localhost/ws_assignment/provider/edit.php";
    $finalurl = $url."?".http_build_query($record);
    $result = HttpGet($finalurl);
    echo $result;
  }


 ?>
