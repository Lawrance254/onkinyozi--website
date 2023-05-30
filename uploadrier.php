<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the image data is set and not empty
    if (isset($_FILES["image_data"]) && $_FILES["image_data"]["error"] === UPLOAD_ERR_OK) {
        // Retrieve the form data
        $price = $_POST["price"];

        // Define the "created" value as the current date and time
        $created = date("Y-m-d H:i:s"); // Example: using the current date and time

        // Establish a database connection
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "on_kinyozi";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }

        // Prepare the SQL statement with placeholders for the image data and created date
        $insertSql = "INSERT INTO images_drier (image_data, price, created) VALUES (?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($insertSql);

        // Bind parameters and execute the statement
        $stmt->bind_param("sss", $imageData,  $price, $created);

        // Read the image data from the uploaded file
        $imageData = file_get_contents($_FILES["image_data"]["tmp_name"]);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>
            window.location.href = "dashboard.php";
            alert("Drier inserted successfully.");
            </script>';
        } else {
            echo "Error inserting data: " . $conn->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Error uploading image: " . $_FILES["image_data"]["error"];
    }
}
?>


