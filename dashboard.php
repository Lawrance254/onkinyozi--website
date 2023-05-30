
<?php 
include("connectlogin.php");
$inactivity_time = 15 * 60;

// Start or resume the session
session_start();

if (isset($_SESSION['last_timestamp']) && (time() - $_SESSION['last_timestamp']) > $inactivity_time) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ownerslogin.php");
    exit();
} else {
    // Regenerate the session ID
    session_regenerate_id(true);

    // Update the last timestamp
    $_SESSION['last_timestamp'] = time();
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ordered services pages</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
 margin: 20px;
}
.pull-left{
  color: turquoise;
  text-align: center;
 font-size: 30px;
}
.pull-lef{
  color: turquoise;
  text-align: center;
}
.pull-left{
  border-bottom: 4px solid turquoise;
}
.services{
	text-align: center;
	background: linear-gradient(91.9deg, rgb(93, 248, 219) 27.8%, rgb(33, 228, 246) 67%);
	padding: 20px;
	color: white;
	font-weight: bold;
	margin-top: 3%;



}
.services h3{
	font-weight: bold;
	font-size: 40px;


}
.services-btn{
	padding: 25px;
	
	margin-left: 20%;

}
.services-btn a{
	padding: 8px 25px;
	text-decoration: none;
	color: white;
	font-weight: bold;
	background-color: turquoise;
	 display: grid;
      grid-template-columns: repeat(auto-fit, minmax(25px, 1fr));
      grid-gap: 10px;
      margin-top: 5px;
      text-align: center;
      width: 70%;
      border-bottom: 4px solid turquoise;
      border-radius: 10px;
      
}

form{
	margin-top: 5%;
}
label{
	color: turquoise;
	font-weight: bold;
	font-size: 20px;
}
input{
	outline-color: turquoise;
	color: turquoise;
	border-radius: 10px;
}
#submit{
	color: white;
	background-color: turquoise;
}
#price-label{
	color: turquoise;
	font-weight: bold;
	font-size: 20px;
}
#image{
	color: turquoise;
	font-weight: bold;
	font-size: 16px;
}
#submit{
	color: white;
	background-color: turquoise;
	border-radius: 10px;
	border-style: none;
}
#price{
	outline: turquoise;
	color: turquoise;
	background-color: transparent;
	border-radius: 10px;
}
.furniture{
	display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));
      grid-gap: 40px;
      margin-top: 50px;
}
#image-dashboard{
	display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 4fr));
      grid-gap: 40px;
      margin-top: 50px;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      

}
#image-dashboard img{
	width: 200px;
	padding: 20px;

}
#image-dashboard input{
	margin-left: 10%;
	margin-bottom: 10%;

	


</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
  <h1 class="pull-lef">Online-Kinyozi Services</h1>
<h2 class="pull-left"> Services and Items Requested by Customers Click the Buttton to view  <a href="login.php" style="text-decoration: none; color: turquoise; margin-left: 3%;"><img src="l2.png" style="font-size: 16px;" width="12px">
Logout</a></h2>
<div class="services">
	<h3>Services Ordered</h3>
</div>

<div class="services-btn">
		<a href="orderlist.php">Blowdry</a>
		<a href="haircutlist.php">Hair Cut</a>
		<a href="pedicurelist.php">Pedicure</a>
		<a href="bodymassagelist.php">Body massage</a>
		<a href="hairtwistinglist.php">Hair Twisting</a>
		<a href="haircoloringlist.php">Hair Coloring</a>
		<a href="shampooandwaxinglist.php">Shampoo and Waxing</a>
		<div class="services-btn2">
			
		</div>

	</div>
  <div class="service-btn">
	<div class="services">
	<h3>Upload furniture to be sold</h3>
</div>
</div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image" id="image" required>
    <label>Price $:</label>
    <input type="text" name="price" id="price" required>
    <input type="submit" name="submit" value="Upload" id="submit">
</form>
<a href="displayfurniture.php" style="margin-left: 30%; background-color: turquoise; padding: 7px; color: white;">Furniture Ordered</a>
<div class="service-btn">
	<div class="services">
	<h3>Upload Shaving Machine to be sold</h3>
</div>
</div>
<form action="uploadmachine.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image_data" id="image_data" style="font-weight: bold;" required>
    <label>Price $:</label>
    <input type="text" name="price" id="price" required>
    <input type="submit" name="submit" value="Upload" id="submit">
</form>
<a href="displaymachine.php" style="margin-left: 30%; background-color: turquoise; padding: 7px; color: white;">Shaving Machine Ordered</a>
 
            <div class="service-btn">
    <div class="services">
    <h3>Upload Hair Driers to be sold</h3>
</div>
</div>
<form action="uploadrier.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image_data" id="image_data" style="font-weight: bold;" required>
    <label>Price $:</label>
    <input type="text" name="price" id="price" required>
    <input type="submit" name="submit" value="Upload" id="submit">
</form>
<a href="displaydrier.php" style="margin-left: 30%; background-color: turquoise; padding: 7px; color: white;">Hair Drier Ordered</a>

              <div class="service-btn">
    <div class="services">
    <h3>Upload Grooming to be sold</h3>
</div>
</div>
<form action="uploadgrooming.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image_data" id="image_data" style="font-weight: bold;" required><br><br>
    <label>Price $:</label>
    <input type="text" name="price" id="price" required><br>
    <label>Product's name:</label>
    <input type="text" name="name" id="name" required><br><br>
    <input type="submit" name="submit" value="Upload" id="submit">
</form>
<a href="displaygrooming.php" style="margin-left: 30%; background-color: turquoise; padding: 7px; color: white;">Groomings Ordered</a>
 



 <div class="services">

                <h3>Furniture Displayed to Customers, Deleting the Item will not be Visible.</h3>

            </div>
             <p style="text-align: center; color: turquoise;">Delete an item when sold</p>
<div class="furniture">
	

<?php
// Include the database configuration file
require_once 'connectlogin.php';

// If delete form is submitted
if(isset($_POST["delete"])){
    // Get the image ID
    $image_id = $_POST['image_id'];

    // Delete the image from the database
    $delete = $conn->prepare("DELETE FROM images WHERE created = ?");
    $delete->bind_param("s", $image_id);

    if($delete->execute()){
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deleted successfully.");
        </script>';
    }else{
        $statusMsg = "Image deletion failed, please try again.";
    }

    // Display status message
    echo $statusMsg;
}
?>

<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image, created, price FROM images ORDER BY created DESC");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $created = $row['created'];
        $imageContent = $row['image'];
         $price = $row['price'];
        ?>

        <div id="image-dashboard">
        	
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
            <form action="dashboard.php" method="post">
            	<label style="margin-left: 10%;">Price in $:</label>
            	<input type="text" name="price" value="<?php echo $price; ?>" >
            	<label style="margin-left: 10%; outline-color: turquoise; color: turquoise;"> Uploaded:</label>
                <input type="text" name="image_id" value="<?php echo $created; ?>" ><br>
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
        <?php
    }
}else{
    echo '<p>No images found</p>';
}
?>



	
</div>
 <div class="services">

        		<h3>Shaving Machines Displayed to Customers, Deleting the Item will not be Visible.</h3>
        	</div>
        	<div class="furniture">
	

<?php
// Include the database configuration file
require_once 'connectlogin.php';

// If delete form is submitted
if(isset($_POST["delete"])){
    // Get the image ID
    $image_id = $_POST['image_id'];

    // Delete the image from the database
    $delete = $conn->prepare("DELETE FROM images_machine WHERE created = ?");
    $delete->bind_param("i", $image_id);

    if($delete->execute()){
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deleted successfully.");
        </script>';
    }else{
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deletion failed. Please try again.");
        </script>';
    }

    // Display status message
    echo $statusMsg;
}
?>

<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image_data, created, price FROM images_machine ORDER BY created DESC");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $created = $row['created'];
        $imageContent = $row['image_data'];
         $price = $row['price'];
        ?>

        <div id="image-dashboard">
        	
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
            <form action="dashboard.php" method="post">
            	<label style="margin-left: 10%;">Price in $:</label>
            	<input type="text" name="price" value="<?php echo $price; ?>" >
            	<label style="margin-left: 10%; outline-color: turquoise; color: turquoise;"> Uploaded:</label>
                <input type="text" name="image_id" value="<?php echo $created; ?>" ><br>
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
        <?php
    }
}else{
    echo '<p>No images found</p>';
}
?>
</div>
<div class="services">

                <h3>Hair Driers Displayed to Customers, Deleting the Item will not be Visible.</h3>
            </div>

    <div class="furniture">
    

<?php
// Include the database configuration file
require_once 'connectlogin.php';

// If delete form is submitted
if(isset($_POST["delete"])){
    // Get the image ID
    $image_id = $_POST['image_id'];

    // Delete the image from the database
    $delete = $conn->prepare("DELETE FROM images_drier WHERE created = ?");
    $delete->bind_param("s", $image_id);

    if($delete->execute()){
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deleted successfully.");
        </script>';
    }else{
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deletion failed. Please try again.");
        </script>';
    }

    // Display status message
    echo $statusMsg;
}
?>

<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image_data, created, price FROM images_drier ORDER BY created DESC");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $created = $row['created'];
        $imageContent = $row['image_data'];
         $price = $row['price'];
        ?>

        <div id="image-dashboard">
            
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
            <form action="dashboard.php" method="post">
                <label style="margin-left: 10%;">Price in $:</label>
                <input type="text" name="price" value="<?php echo $price; ?>" >
                <label style="margin-left: 10%; outline-color: turquoise; color: turquoise;"> Uploaded:</label>
                <input type="text" name="image_id" value="<?php echo $created; ?>" ><br>
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
        <?php
    }
}else{
    echo '<p>No images found</p>';
}
?>
</div>
<div class="services">

                <h3>Groomings Displayed to Customers, Deleting the Item will not be Visible.</h3>
            </div>


 <div class="furniture">
    

<?php
// Include the database configuration file
require_once 'connectlogin.php';


// If delete form is submitted
if (isset($_POST["delete"])) {
    // Get the image ID
    $image_id = $_POST['image_id'];

    // Delete the image from the database
    $delete = $conn->prepare("DELETE FROM images_grooming WHERE created = ?");
    $delete->bind_param("s", $image_id);

    if ($delete->execute()) {
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deleted successfully.");
        </script>';
    } else {
        $statusMsg = '<script type="text/javascript">
            window.location.href ="dashboard.php";
            alert("Image deletion failed. Please try again.");
        </script>';
    }

    // Display status message
    echo $statusMsg;
}

?>

<!-- Display the images from the database -->
<?php

// Fetch all images from the database
$result = $conn->query("SELECT image_data, name, created, price FROM images_grooming ORDER BY created DESC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $created = $row['created'];
        $imageContent = $row['image_data'];
        $price = $row['price'];
        ?>

        <div id="image-dashboard">

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
            <form action="dashboard.php" method="post">
                <label style="margin-left: 10%;">Price in $:</label>
                <input type="text" name="price" value="<?php echo $price; ?>">
                 <label style="margin-left: 10%;">Uploaded:</label>
                 <input type="text" name="created" value="<?php echo $created; ?>">
                <input type="hidden" name="image_id" value="<?php echo $created; ?>"><br>
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
<?php
    }
} else {
    echo '<p>No images found</p>';
}
?>

</div>




</body>
</html>
</div>
</div>
</div>        
</div>
</div>
</body>
</html>