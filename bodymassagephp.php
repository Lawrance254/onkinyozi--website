<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_error()) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete all records from the table
$sql = "DELETE FROM body_massage";

if ($conn->query($sql) === TRUE) {
  echo '<script>
  window.location.href="bodymassagelist.php";

alert("This will delete all the data. Press ok to continue");
  </script>';
} else {
  echo "Error deleting records: " . $conn->error;
}

$conn->close();
?>