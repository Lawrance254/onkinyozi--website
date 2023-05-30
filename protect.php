<?php

  session_start();

  if(! isset($_SESSION["last_timestamp"])){
      header("location:login.php");
  }

?>