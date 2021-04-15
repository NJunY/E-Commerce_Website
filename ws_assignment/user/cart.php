<?php

session_start();
if(isset($_SESSION['cid'])){
  $cid = $_SESSION['cid'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
  </head>
  <style media="screen">
    #myTable, th,td{
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
  <button type="button" name="button"><a href="logout.php">Logout</a></button><br>
  <body onLoad="javascript:loadCart()">
    <h3>Edit Amount With Cart ID</h3>
    <form action="http://localhost/ws_assignment/requester/editCart.php?key=$cid" method="GET">
      <label>Enter the Cart ID:</label>
      <input type="number" name="caid" placeholder="100">
      <label>Enter the Amount:</label>
      <input type="number" name="amount" placeholder="Amount"><br>
      <input type="submit" name="e_submit" value="Edit">
    </form>
    <h3>Delete Item With Cart ID</h3>
    <form action="http://localhost/ws_assignment/requester/e_deleteCart.php?caid=caid" method="GET">
      <label>Enter the Cart ID:</label>
      <input type="number" name="caid" placeholder="100"><br>
      <input type="submit" name="d_submit" value="Delete">
    </form>
    <br><br><br>
    <div id="cart">
    </div>
    <br>
    <form action="http://localhost/ws_assignment/requester/deleteCart.php" method="GET">
      <input type="submit" value="Clear">
    </form>
  </body>
  <script>
  function loadCart(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("cart").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "http://localhost/ws_assignment/requester/getCart.php","true");
    xhttp.send();
  }
  </script>
</html>
<?php
}else{
  echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php'>";
}


 ?>
