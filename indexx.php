<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Upload image, display, edit and delete in PHP </title>
	<style type="text/css">
		body{
background-color: #f1f1f1;
	}
		.form-control {
    width: 100%;
    height: 25px;
    padding: 6px 12px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn-primary {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px; 
    background-color: #337ab7;
    color: #fff;
}
.btn_del {
  background-color: #FF5733 !important;   
}
.container 
{ 
margin-left: 30%;
width: 400px ;
background-color: #fff;
padding: 10px;
padding-right: 40px;
    border: 1px solid #ccc;
    border-radius: 4px;
 }
 .container_display
{ 
margin-left: 10%;
width: 900px ;
background-color: #fff;
padding: 10px;
padding-right: 40px;
    border: 1px solid #ccc;
    border-radius: 4px;
 }

label   {
	font-size: 16px;
}
.success 
{ 
	margin: 5px auto;
  border-radius: 5px;
  border: 3px solid #fff;
  background: #33CC00;
  color: #fff;
font-size: 20px;
  padding: 10px;
  box-shadow: 10px 5px 5px grey;
}
	</style>
</head>
<body>
<div class="container_display">
		<span style="float:right;"><a href="uploaded.php"><button class="btn-primary">Upload New image </button></a></span>
		<br><br>
	<?php 
	if(isset($_GET['image_success']))
		{
		echo '<div class="success">Image Uploaded successfully</div>'; 
		}

		if(isset($_GET['action']))
		{
    $action=$_GET['action'];
	if($action=='saved')
	{
		echo '<div class="success">Saved </div>'; 
	}
	elseif($action=='deleted')
	{
		echo '<div class="success">Image Deleted Successfully ... </div>'; 
	}
		}
	?>
	<table cellpadding="10">
		<tr>
			<th> Image</th>
			<th>Title</th>
			<th>Action</th>
		</tr>
		<?php $res=mysqli_query($db,"SELECT* from items ORDER by id DESC");
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                  <td><img src="uploads/'.$row['image'].'" height="200"></td> 
                  <td>'.$row['title'].'</td> 
                  <td><a href="edit.php?id='.$row['id'].'"><button class="btn-primary">Edit </button></a>
                  	<br> <br>
                  	 <a href=\'delete.php?id='.$row['id'].'\' onClick=\'return confirm("Are you sure you want to delete?")\'"><button class="btn-primary btn_del">Delete</button></a>
                  </td> 
				</tr>';
} ?>
		
	</table>
	</div>
</body>
</html>