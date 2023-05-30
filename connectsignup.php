<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST,'password');



$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
	die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
echo "";

 $sql = "INSERT INTO account (username, password) values ('$username', '$password')";

 if ($conn->query($sql)) {
 	echo '<script>
          window.location.href="login.php";
         alert("Successfuly created an account. Login to continue");

 	</script>';
 }
 else{
 	echo "Error: ".sql."<br>".$conn->error;
 }
 $conn->close()


  ?>



  <!------<location path="protected">
    <system.web>
        <authorization>
            <deny users="?" />
        </authorization>
    </system.web>
</location>  

                      pattern="(?=.*[A-Z]).{8,}" title="Must contain at least  8 characters,a number and uppercase letter"