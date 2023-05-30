<?php
// Include the database configuration file
require_once 'connectlogin.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Select a random image from the table
    $sql = "SELECT image FROM images ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['image'];

        // Determine the image type
        $finfo = finfo_open();
        $imageType = finfo_buffer($finfo, $imageData, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        // Display the image to the user
        echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" alt="Selected Image">';
    } else {
        echo "Image not found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

