<?php 
 $host = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $dbname = "owners_kinyozi";


 $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

 if (mysqli_connect_error()) {
   	 die("unable to connect".$conn->connect_error());
   }
   echo " ";

 ?>