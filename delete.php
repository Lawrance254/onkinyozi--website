<?php
include_once 'connectlogin.php';

// Check if the 'id' parameter is present in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $escapedId = mysqli_real_escape_string($conn, $id);

    // Delete the row with the specified id from the database
    $sql = "DELETE FROM blow_dry WHERE id = '$escapedId'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Row deleted successfully
        echo "Record deleted successfully.";
    } else {
        // Error occurred while deleting the row
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // No 'id' parameter provided, show an error message
    echo "Invalid request. Please provide a valid ID.";
}

// Close the database connection
mysqli_close($conn);
?>

