<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Order furniture</title>
    <style type="text/css">
        #myAlert{
            width: 30%;
            margin-left: 30%;
            height: auto;
            margin-bottom: 0;

        }
        
    </style>
</head>
<body>

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

            // Display the image to the user
            echo '<div style="max-width: 500px; margin-left: 30%; box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);">';
            if (!empty($imageData)) {
                $finfo = finfo_open();
                $imageType = finfo_buffer($finfo, $imageData, FILEINFO_MIME_TYPE);
                finfo_close($finfo);
                echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" alt="Selected Image" style="max-width: 50%; height: auto; ">';
            } else {
                echo "Image not found.";
            }
            echo '</div>';
        } else {
            echo "Image not found.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

   
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
                $alertMessage = "Thank you for buying our item. We will email you shortly.";
                $alertType = "success";
            } else {
                $alertMessage = "Error: " . $insertSql . "<br>" . $stmt->error;
                $alertType = "danger";
            }
        } else {
            $alertMessage = "Image not found.";
            $alertType = "danger";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        $alertMessage = " Name field cannot be empty.";
        $alertType = "danger";
    }
    ?>

    <!-- Display the alert using Bootstrap -->
    <div id="myAlert" class="alert alert-<?php echo $alertType; ?>" role="alert">
        <?php echo $alertMessage; ?>
    </div>


    <div class="container mt-5" style="">
        <div class="row justify-content-center">
                    
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body" style="box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);">
                         <form method="POST" action="">
            <input type="submit" name="submit" value="Choose your Favourite" style="color: white; background-color: turquoise; border-radius: 10px; margin-left: 10%; outline-style: none;"><br><br>
        </form>
                        <form method="POST" action="">
            <label for="name" style="color: turquoise; font-weight: bold;">Name:</label>
            <input type="text" name="name" id="name" required style="outline-color: turquoise; color: turquoise;"><br><br>

            <label for="email" style="color: turquoise; font-weight: bold;">Email:</label>
            <input type="email" name="email" id="email" required style="outline-color: turquoise; color: turquoise;"><br><br>

            <label for="place" style="color: turquoise; font-weight: bold;">Place:</label>
            <input type="text" name="place" id="place" required style="outline-color: turquoise; color: turquoise;"><br><br>

            <label for="date" style="color: turquoise; font-weight: bold;">Date:</label>
            <input type="date" name="date" id="date" required style="outline-color: turquoise; color: turquoise;"><br><br>

            <button type="submit" style="color: white; background-color: turquoise; border-radius: 10px; font-weight: bold;">Submit</button>
            <a href="index.php" style="margin-left: 10%; text-decoration: none; background-color: turquoise; color: white; padding: 2px 7px; border-radius: 10px;">Home</a>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript code to make the alert disappear after a certain time -->
    <script>
        // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Get the alert element
            var alertElement = document.getElementById("myAlert");

            // Set a timeout to hide the alert after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                alertElement.style.display = "none";
            }, 5000);
        });
    </script>
</body>
</html>
