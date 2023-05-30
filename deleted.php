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

// Retrieve the id parameter from the URL query string
$id = $_GET['id'];

// Select the image filename from the database
$selectSql = "SELECT image FROM furniture WHERE id = ?";
$stmt = $conn->prepare($selectSql);
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->bind_result($imageFileName);
$stmt->fetch();
$stmt->close();

// Delete the image file from the server
if (!empty($imageFileName)) {
    $imagePath = 'path/to/images/' . $imageFileName; // Replace with the actual image path
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Perform the delete operation
$deleteSql = "DELETE FROM furniture WHERE id = ?";
$stmt = $conn->prepare($deleteSql);
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    // Deletion successful
    // Redirect the user back to the original page
    header("Location: displayfurniture.php");
    exit();
} else {
    // Deletion failed
    echo "Error: " . $deleteSql . "<br>" . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>

