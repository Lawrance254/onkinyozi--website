
 <?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die("Unable to connect: " . $conn->connect_error);
}
?>
