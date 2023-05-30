<?php
// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

// Select image, name, email, place, and date from the table
$sql = "SELECT image, name, email, place, date FROM furniture";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $place = $row['place'];
        $date = $row['date'];

        // Retrieve the image binary data
        $imageData = $row['image'];

        // Display the image
        echo "Image: <img src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' style='width: 10%; height: auto;'><br>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Place: $place<br>";
        echo "Date: $date<br><br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>
