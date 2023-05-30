
<?php 
include("connectlogin.php");

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
}
.pull-lef{
  color: turquoise;
  text-align: center;
}
.pull-left{
  border-bottom: 4px solid turquoise;
}

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
 <h2 class="pull-left"><a href="dashboard.php"><img src="t17.png" width="50px" style="margin-right: 6%;"></a>Hair Cut Customer List With Respect to Date Ordered</h2>
</div>

<?php
include_once 'orderlistconnect.php';
$result = mysqli_query($conn,"SELECT * FROM hair_cut");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>

<table class='table table-bordered table-striped'>
<tr>
<th bgcolor="turquoise" style="color: white;">Customer Name</th>
<th bgcolor="turquoise" style="color: white;">Phone Number</th>
<th bgcolor="turquoise" style="color: white;">Email</th>
<th bgcolor="turquoise" style="color: white;">Place</th>
<th bgcolor="turquoise" style="color: white;">Date Ordered</th>
<th bgcolor="turquoise" style="color: white;">Delete</th>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["place"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><a href="haircutphp.php?username=<?php echo $username?>"><img src="t18.png" width="20px" style="margin-left: 6%;"></a></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}
?>
</div>
</div>        
</div>
</div>
</body>
</html>
