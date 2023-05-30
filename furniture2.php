
<?php


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$place = filter_input(INPUT_POST, 'place');
$date = filter_input(INPUT_POST, 'date');
if (!empty($name)) {
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "on_kinyozi";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

echo "";

// Select a random image from the table
$sql = "SELECT image FROM images ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $imageData = $row['image'];

    // Prepare and bind the insert statement
    $insertSql = "INSERT INTO furniture (image, name, email, place, date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssss", $imageData, $name, $email, $place, $date);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $insertSql . "<br>" . $stmt->error;
    }
} else {
    echo "Image not found.";
}

// Close the database connection
$stmt->close();
$conn->close();
} else {
    echo '<script>
             alert("Name field is empty!!!");
    </script>';
}
?>

