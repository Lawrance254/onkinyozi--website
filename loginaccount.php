<?php 
session_start();
include("connectlogin.php");
  if (isset($_POST['submit'])) {
  	
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"]);


    $sql = "select * from account where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


     if ($count == 1) {
      header("Location:index.php"); 
    }
    else{
    	echo '<script>
    	window.location.href ="login.php";
    	alert("Invalid login! Correct details required.");
    	</script>';
    }
    
 }
?>

