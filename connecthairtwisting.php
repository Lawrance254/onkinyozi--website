<?php

$username = filter_input(INPUT_POST, 'username');
$phone = filter_input(INPUT_POST,'phone');
$email = filter_input(INPUT_POST,'email');
$place = filter_input(INPUT_POST,'place');
$date = filter_input(INPUT_POST,'date');




$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
echo "";

 $sql = "INSERT INTO hair_twisting (username, phone, email, place, date) values ('$username', '$phone', '$email', '$place', '$date')";

 if ($conn->query($sql)) {
    echo '<script>
        window.location.href="hairtwisting.php";
         alert("Thank you for ordering with us we are sending you an email shortly");

    </script>';
 }
 else{
    echo "Error: ".sql."<br>".$conn->error;
 }
 $conn->close()


  ?>