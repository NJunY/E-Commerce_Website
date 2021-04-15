<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    #myTable, th,td{
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
  <body onLoad="javascript:loadPro()">
    <h2>Find Product</h2>
    <form action="searchMenu.php" method="post">
      <label>Product Name: </label>
      <input type="text" name="p_name" placeholder="HyperX Keyboard">
      <input type="submit" name="searchButton" value="Search">
    </form>

  <?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "ws_a";
    session_start();
    $c_id = $_SESSION["cid"];

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    function HttpGet($url)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $output = curl_exec($ch);
      curl_close($ch);
      return $output;
    }
    if(isset($_POST["searchButton"])){
      $p_name = $_POST["p_name"];
      $jsonobj = HttpGet("http://localhost/ws_assignment/provider/allProduct.php");
      $obj = json_decode($jsonobj);
      foreach ($obj as $key1 => $value1) {
        $a = array();
        foreach ($value1 as $key2 => $value2) {
          array_push($a,$value2);
        }
        if (strpos($a[1], $p_name) !== false) {?>
            <form action="searchMenu.php" method="post">
              <input type="hidden" name="id" value="<?php echo $a[0] ?>" readonly><br><br>
              <input type="text" name="name" value="<?php echo $a[1] ?>" readonly><br><br>
              <input type="text" name="price" value="<?php echo $a[2] ?>" readonly><br><br>
              <input type="text" name="desc" value="<?php echo $a[3] ?>" readonly><br><br>
              <input type="text" name="quantity" value="<?php echo $a[4] ?>" readonly><br><br>
              <input type="text" name="orderQuantity" placeholder="100" required><br><br>
              <input type="submit" name="addtoCart" value="Add To Cart">
            </form>
            <?php echo "<BR>";
              };

        }
      }
      if (isset($_POST["addtoCart"])){
        $p_id = $_POST["id"];
        $ca_name = $_POST["name"];
        $ca_price = $_POST["price"];
        $p_quantity = $_POST["quantity"];
        $ca_quantity = $_POST["orderQuantity"];

        if($ca_quantity > $p_quantity){
          echo '<script>alert("Quantity Exceeded")</script>';
        }
        else{
         $add = "INSERT INTO cart (ca_name, ca_price, ca_amount, c_id, pid) VALUES ('$ca_name','$ca_price', '$ca_quantity', '$c_id', '$p_id')";
         if ($conn->query($add) === TRUE) {
           echo '<script>alert("Done")</script>';
         } else {
           echo "Error: " . $add . "<br>" . $conn->error;
         }
        }
      }
    ?>
    <br>
    <div id="product">
    </div>
  </body>
  <script>
    function loadPro(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          document.getElementById("product").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "http://localhost/ws_assignment/requester/getProductlist.php","true");
      xhttp.send();
    }
  </script>
</html>
