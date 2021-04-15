<?php

  setcookie('cid',' ',time()+(3600*24));
  setcookie('login',0,time()+(3600*24));

  session_start();
  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();


  echo "<meta http-equiv='refresh' content='0; url=http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php'>";
 ?>
