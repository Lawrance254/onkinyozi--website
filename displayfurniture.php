

<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Furniture Ordered</title>
    <style type="text/css">
        body{
            display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 4fr));
      width: 90%;
      grid-gap: 20px;
      padding: 40px;
      margin-right: 10%;
      

        }
        .card-body{
            
       box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
       padding: 5px;
      background-color: #fff;
      
      align-items: center;
      border-radius: 20px;
        }
        .card-body a{
            text-decoration: none;
            background-color: turquoise;
            padding: 10px 20px;
            color: white;
            border-radius: 10px;
            margin-left: 40%;

        }
        @media only screen and (max-width: 700px){
            .card-body{
                margin-right: 5%;
                width: 80%;
            }
            .card-body a{
                margin-right: 20%;
            }

        }

    </style>
</head>
<body>
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

// Check if a delete request is made
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Delete the row from the table
    $deleteSql = "DELETE FROM furniture WHERE id = $deleteId";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        // Set a session variable to indicate successful deletion
        $_SESSION['delete_success'] = true;
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
}

// Select image, name, email, place, and date from the table
$sql = "SELECT id, image, name, email, place, date FROM furniture";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $place = $row['place'];
        $date = $row['date'];

        // Retrieve the image binary data
        $imageData = $row['image'];

        // Display the row data
        echo "<div class=\"card mb-3\">";
        echo "<div class=\"card-body\">";
        echo "Image: <img src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' width='30%'><br>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Place: $place<br>";
        echo "Date: $date<br>";
        echo "<a href='?delete_id=$id' class=\"btn btn-danger\">Delete</a><br><br>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>

<!-- JavaScript code to control the visibility of the success message -->
<script>
    // Check if the session variable is set and display the success message
    <?php if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        // Show the success message
        document.getElementById('successMessage').style.display = 'block';

        // Hide the success message after 3 seconds
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    });
    <?php unset($_SESSION['delete_success']); // Unset the session variable ?>
    <?php endif; ?>
</script>

<!-- Success message using Bootstrap alert component -->
<div id="successMessage" class="alert alert-success text-white bg-turquoise" style="display: none; background-color: turquoise; color: white; height: 10%; padding: 10px;">
    Row deleted successfully.
</div>




<div>
    <a href="dashboard.php" style="margin-left: 50%; text-decoration: none; color: white; background-color: turquoise; border-radius: 10px; padding: 20px;">Back</a>
</div>
</body>
</html>