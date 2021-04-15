<?php
  function HttpGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  $jsonobj = HttpGet("http://localhost/ws_assignment/provider/allProduct.php");
  $obj = json_decode($jsonobj);
?>
  <table id="myTable">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price (RM)</th>
      <th>Description</th>
      <th>Quantity</th>
    </tr>

  <?php
  foreach($obj as $key1 => $value1){
    echo "<tr>";
    foreach($value1 as $key2 => $value2){

      echo "<td>".$value2."</td>";
      //echo "\n<BR>".$key2."=".$value2;
    }
    echo "</tr>";

  }
  ?>
  </table>
