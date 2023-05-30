




<?php
include("connectlogin.php");
include("protect.php");
$inactivity_time = 15 * 60;

if (isset($_SESSION['last_timestamp']) && (time() - $_SESSION['last_timestamp']) > $inactivity_time) {
    session_unset();
    session_destroy();

    
    header("Location: login.php");
    exit();
  }else{
   
    session_regenerate_id(true);

    // Update the last timestamp
    $_SESSION['last_timestamp'] = time();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="9001">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript">
        function isAuthenticated() {
            
        }
    </script>
   <style type="text/css">
        body{
            background-color: white;

        }
    
    #header{
        color: darkturquoise;
        padding: 30px 0;
    }
    #header h1{
       
        text-align: center;
        font-size: 40px;
        font-family: sans-serif;

    }
    #header-l h1{
       
        text-align: center;
        font-size: 40px;
        font-family: sans-serif;
        margin: 5px 0;
        color: turquoise;

    }
    .containr{
        max-width: 1200px;
        margin: auto;
        background: linear-gradient(91.9deg, rgb(93, 248, 219) 27.8%, rgb(33, 228, 246) 67%);
        overflow: auto;
        border-radius: 30px;
    }
    .gallery{
        margin: 5px;
        border: 1px solid white;
        float: left;
        border-radius: 20px;

    }
    .gallery img{
        width: 100%;
        height: auto;
    }
    .desc{
      padding: 15px;
      align-items: center;
    }
    .desc a{
       text-decoration: none;
       color: white;
       border: 2px solid white;
       padding: .5px 10px;
       border-radius: 10px;
    }
    .desc p{
       text-decoration: none;
       color: white;
    }
    #services{
      padding: 30px 0;
    }
    .services-list{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));
      grid-gap: 40px;
      margin-top: 50px;
    }
    .services-list div{
      background: linear-gradient(91.9deg, rgb(93, 248, 219) 27.8%, rgb(33, 228, 246) 67%);
      padding: 20px;
      font-size: 13px;
      font-weight: 300;
      border-right: 10px;
      transition: transform 0.5s;
      border-radius: 20px;
    }
    .services-list div p{
      font-size: 30px;
      font-weight: 500;
      margin-bottom: 15px;
      color: white;
    }
    .services-list div img{
      text-decoration: none;
      color: white;

    }

    .services-list div:hover{
      transform: translateY(-10px);

    }
    /*------------------------------------------furniture-------------------------*/
    #furniture, .gllery{
      padding: 30px 0;
    }
    .furniture-list{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 4fr));
      grid-gap: 40px;
      margin-top: 50px;

    }
    .furniture-list div, .gllery{
       padding: 20px;
      font-size: 13px;
      font-weight: 300;
      border-right: 10px;
      border-radius: 20px;
    }
    .furniture-list div p{
       font-size: 30px;
      font-weight: 500;
      color: turquoise;

    }
    .furniture-list div a{
      text-decoration: none;
      margin: 20px 0 10px;
      padding: 6px 30px;
      background-color: turquoise;
      color: white;
      border-radius: 20px;
    }
    .gllery{
        background-color: turquoise;
    }
    /*------------------------------------------------electricals------------------------------------------*/
    /*-------------------------shaving-machines--------------------------------------*/
    #header h3{
       text-align: center;
        font-size: 20px;
        font-family: sans-serif;
    }
    #electricals{
       padding: 30px 0;
    }
    .electricals-content{
       text-align: center;
        font-size: 40px;
        font-family: sans-serif;

    }
    .shaving-machine{
       display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 3fr));
      grid-gap: 20px;
      margin-top: 50px;
    }
    .shaving-machine div{
      padding: 10px;
      font-size: 13px;
      font-weight: 300;
      border-right: 10px;
      border-radius: 20px;
    }
    .shaving-machine div p{
      font-size: 30px;
      font-weight: 500;
      color: turquoise;
    }
    .shaving-machine div a{
       text-decoration: none;
      margin: 20px 0 10px;
      padding: 6px 30px;
      background-color: turquoise;
      color: white;
      border-radius: 20px;

    }
    .hair-drier{
       display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));
      grid-gap: 20px;
      margin-top: 50px;
    }
    .hair-drier div{
       padding: 10px;
      font-size: 13px;
      font-weight: 300;
      border-right: 10px;
      border-radius: 20px;

    }
    .hair-drier div p{
      font-size: 30px;
      font-weight: 500;
      color: turquoise;

    }
    .hair-drier div a{
      text-decoration: none;
      margin: 20px 0 10px;
      padding: 6px 30px;
      background-color: turquoise;
      color: white;
      border-radius: 20px;

    }
    .grooming-content{
        display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));
      grid-gap: 20px;
      margin-top: 50px;

    }
    .grooming-content div{
       padding: 10px;
      font-size: 13px;
      font-weight: 300;
      border-right: 10px;
      border-radius: 20px;
    }
    .grooming-content div p{
       font-size: 30px;
      font-weight: 500;
      color: turquoise;

    }
    .grooming-content div a{
       text-decoration: none;
      margin: 20px 0 10px;
      padding: 6px 30px;
      background-color: turquoise;
      color: white;
      border-radius: 20px;


    }
    /*-------------------------------------get in touch--------------------------------*/
    .contact-left{
      flex-basis: 35%;
    }
    .contact-right{
      flex-basis: 60%;
    }
    .contact-left p{
      margin-top: 30px;
    }
    .contact-left img{
      margin-right: 8px;
      font-size: 25px;

    }
    .icons{
      margin-top: 30px;

    }
    .icons img{
       margin-right: 3px;
       transition: transform .5s;
    }
    .icons img:hover{
      transform: translateY(-5px);
    }
    #submit{
      margin: 20px 0 10px;
      padding: 6px 30px;
      cursor: pointer;
      background-color: turquoise;
      color: white;
      border-left: turquoise;
      border-right: turquoise;
      border-bottom: turquoise;
      border-top: turquoise;
      border-radius: 10px;
      outline: none;
    }
     .contact-right form{
      width: 100%;

     }
     form input, form textarea{
      width: 60%;
      border-right: none;
      border-top: none;
      border-left: none;
      outline: none;
      padding: 15px;
      background-color: none;
      border-bottom-color: turquoise;
      margin: 10px 0;
      color: turquoise;
      font-size: 18px;

     }
     form input, form textarea:hover{
      
     }
     #submit{
      padding: 8px 20px;
     }
    .riw{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 90px 0;

}
.copyright{
  width: 100%;
  text-align: center;
  padding: 15px 0;
  background:  linear-gradient(91.9deg, rgb(93, 248, 219) 27.8%, rgb(33, 228, 246) 67%);
  font-weight: 300;
  margin-top: 5px;
}
.copyright p{
  color: white;
  font-weight: 300;
}
#msg{
  color: turquoise;
  display: block;

}
#image-dashboard{
    display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));
      grid-gap: 20px;
      margin-top: 10px;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
        margin: 80px auto 0;
        padding: 10px;
        border-radius: 20px;
      

}
#image-dashboard img{
    width: 200px;

}

    </style>


</head>
<body>

  <div class="container">
  	<div class="navbar">
  		<img src="logo.png" class="logo">
         <a href="login.php" style="text-decoration: none; color: turquoise; margin-top: 1%"><img src="l2.png" width="12px">
Logout</a>
        
  		<nav>
  			<ul id="menuList">
  				<li><a href="#">Home</a></li>
  				<li><a href="#new-items">New Items</a></li>
  				<li><a href="#services">Services</a></li>
  				<li><a href="#contact-us">Get In Touch</a></li>
  				<li><a href="#electricals">Electricals</a></li>
  				<li><a href="#furniture">Furniture</a></li>
  				<li><a href="#groomings">Grooming</a></li>
          
  			</ul>
  		</nav>

  		<img src="menu.png" class="menu-icon" onclick="togglemenu()">
  	</div>
    <div id="home">
  	<div class="row">
  		<div class="col-1">
  			<h2>Welcome to Our<br><span>Online Kinyozi</span>  Services</h2>
  			<h3>We Offer To Our Customers Instant Services</h3>
  			<div id="btn">
  				<a href="#services">Buy Our Services</a>
  			</div>
  		</div>
  		<div class="col-2">
  			<img src="back.png" class="side-img">
  			<div class="color-box">
  				
  			</div>
  		</div>
  	</div>
    </div>
    <!----------------------------new-----item---------->
    <div id="new-items">
  	 <div id="header">
             <h1>New Items</h1>
     </div>
     <div class="containr">
         <div class="gallery">
            <img src="m5.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m1.png">
             <div class="desc">
                <p>Ksh. 1,066</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m8.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m8.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m0.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m3.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m9.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m5.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m8.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
          <div class="gallery">
            <img src="m5.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
         <div class="gallery">
            <img src="n1.png" style="width: 220px;">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
         <div class="gallery">
            <img src="s2.png">
             <div class="desc">
                <p>Ksh. 166</p>
                 <a href="">Order with us</a>
             </div>
         </div>
     </div>
     </div>
     <!------------------------------------------------services----------------------------------------->
     <div id="services">
       <div class="services-content">
         <div id="header">
             <h1>Our Services</h1>
     </div>
     <div class="services-list">
       <div>
           <img src="s6.png" width="250px">
           <p>Blowdry</p>
           <a href="blowdry.php"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s4.png">
           <p>Hair Cut</p>
          <a href="haircut.php"><img src="b.png" style="width: 60%;"></a>
       </div>
        <div>
           <img src="s2.png">
           <p>Selling Items</p>
           <a href="#furniture"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s11.png" width="240px">
           <p>Body Massage</p>
           <a href="bodymassage.php"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s0.png" width="200px">
           <p>Pedicure</p>
           <a href="Pedicure.php"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s12.png" width="220px">
           <p>Hair Twisting</p>
           <a href="hairtwisting.php"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s13.png" width="200px">
           <p>Hair Coloring</p>
           <a href="haircolouring.php"><img src="b.png" style="width: 60%;"></a>
       </div>
       <div>
           <img src="s14.png" width="200px">
           <p>Shampoo and Waxing</p>
           <a href="shampooandwaxing.php"><img src="b.png" style="width: 60%;"></a>
       </div>
     </div>
       </div>
     </div>
     <!------------------------------------------------------furniture------------------------------->
     <div id="furniture">
        <div id="header">
            <h1>Furniture</h1>
        </div>
        <div class="furniture-list">

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
                <label style="color: turquoise; font-size: 15px; font-weight: bold;">Price in $:</label>
                 <input type="text" name="image_id" value="<?php echo $price; ?>"><br><br><br>
                 <a href="formfurniture.php" style="margin-left: 40%; padding-right: 30px;">Buy</a>
            </form>
        </div>
        <?php
    }
}else{
    echo '<p>No images found</p>';
}
?>
         
     </div>
  
        </div>

          

    <!-----------------------------------------------------electronics----------------------------->
 <div id="electricals">
        <div id="header">
            <h1>Shaving Machines</h1>
        </div>
        <div class="furniture-list">
<!-- Display the images from the database -->
<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image_data, created, price FROM images_machine ORDER BY created DESC");

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $created = $row['created'];
            $imageContent = $row['image_data'];
            $price = $row['price'];
            ?>
            <div id="image-dashboard">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
                <form action="dashboard.php" method="post">
                    <label style="color: turquoise; font-size: 15px; font-weight: bold;">Price in $:</label>
                    <input type="text" name="price" value="<?php echo $price; ?>"><br><br><br>
                    <a href="formachine.php" style="margin-left: 40%; padding-right: 30px;">Buy</a>
                </form>
            </div>
            <?php
        }
    } else {
        echo '<p>No images found</p>';
    }
} else {
    echo 'Error executing query: ' . $conn->error;
}
?>


     </div>
  
        </div>
         <div id="electricals">
        <div id="header">
            <h1>Hair Driers</h1>
        </div>
        <div class="furniture-list">
<!-- Display the images from the database -->
<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image_data, created, price FROM images_drier ORDER BY created DESC");

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $created = $row['created'];
            $imageContent = $row['image_data'];
            $price = $row['price'];
            ?>
            <div id="image-dashboard">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
                <form action="dashboard.php" method="post">
                    <label style="color: turquoise; font-size: 15px; font-weight: bold;">Price in $:</label>
                    <input type="text" name="price" value="<?php echo $price; ?>"><br><br><br>
                    <a href="formhair.php" style="margin-left: 40%; padding-right: 30px;">Buy</a>
                </form>
            </div>
            <?php
        }
    } else {
        echo '<p>No images found</p>';
    }
} else {
    echo 'Error executing query: ' . $conn->error;
}
?>


     </div>
  
        </div>


 <!---------------------------------------------------------------groomings------------------------------------>
<div id="groomings" style="margin-bottom: 10%;">
        <div id="header">
            <h1>Groomings</h1>
        </div>
        <div class="furniture-list">
<!-- Display the images from the database -->
<!-- Display the images from the database -->
<?php
// Fetch all images from the database
$result = $conn->query("SELECT image_data, name, created, price FROM images_grooming ORDER BY created DESC");

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $created = $row['created'];
            $imageContent = $row['image_data'];
            $price = $row['price'];
            $name = $row['name'];
            ?>
            <div id="image-dashboard">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imageContent); ?>" />
                <form action="dashboard.php" method="post">
                    <label style="color: turquoise; font-size: 15px; font-weight: bold;">Price in $:</label>
                    <input type="text" name="price" value="<?php echo $price; ?>"><br><br>
                     <label style="color: turquoise; font-size: 15px; font-weight: bold;">Product:</label>
                     <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
                    <a href="formgrooming.php" style="margin-left: 40%; padding-right: 30px;">Buy</a>
                </form>
            </div>
            <?php
        }
    } else {
        echo '<p>No images found</p>';
    }
} else {
    echo 'Error executing query: ' . $conn->error;
}
?>


     </div>
  
        </div>







 
 <div id="contact-us">
  
     <div class="container-us">
      <div id="header-l">
             <h1>Get In Touch</h1>
     </div>
       <div class="riw">
         <div class="contact-left">
          <p><img src="t6.png" width="19px">lawranceb1998@gmail.com</p>
          <p><img src="t7.png" width="20px">+254740298857</p>
         <div class="icons">
           <a href=""><img src="t1.png" width="20px"></a>
           <a href=""><img src="t2.png" width="20px"></a>
           <a href=""><img src="t4.png" width="20px"></a>
            <a href=""><img src="t5.png" width="20px"></a>
         </div>
          <a href="" style="text-decoration: none; display: block; background-color: turquoise; margin-top: 20px; color: white; padding: 8px 20px; width: 30%; border-radius: 40px 0px 50px 40px;">Lets chat<img src="t3.png" width="40px" style="margin-top: -10px;"></a>
         </div>
          <div class="contact-right">
            <form name="submit-to-google-sheet" action="" method="POST">
              <img src="t8.png" width="19px"><input type="name" name="name" id="name" placeholder="Your name" required> <br><img src="t7.png" width="15px">
            <input type="text" name="phone" id="phone" placeholder="Your phone number" required><br><img src="t9.png" width="15px">
              <input type="email" name="email" id="email" placeholder="Your email" required><br><img src="t10.png" width="15px">
              <input type="text" name="text" id="message" placeholder="Your message" required><br><img src="t11.png" width="15px">
              <input type="date" name="date" id="date" required>
              <input type="submit" name="submit" id="submit" value="Submit">
            </form>
            <span id="msg"></span>
          </div>
       </div>
     </div>
 </div>
 </div>
  </div>
  <div class="top-icon">
    
  </div>
  <div class="copyright">
   <p>Copyright &copy 2023, All Rights conserved<img src="t13.png" width="17px"></p>
  </div>
  
  <script>
  var menuList = document.getElementById("menuList");
  menuList.style.maxHeight = "0px";
  function togglemenu() {
    if (menuList.style.maxHeight == "0px") {
      menuList.style.maxHeight = "230px";
    } else {
      menuList.style.maxHeight = "0px";
    }
  }

</script>
<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbx0fKFZat1CERts62BPLsIRZJDXyMV0dqPDxQJeTYdlyz9SUluHWGJQ7KDH9M5D9hjC/exec'
  const form = document.forms['submit-to-google-sheet']
  const msg = document.getElementById('msg')

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
        msg.innerHTML ="Message sent successfully. We will email you"
        setTimeout(function(){
          msg.innerHTML = ""
        },5000)
        form.reset()
      })
      .catch(error => console.error('Error!', error.message))
  })
</script>
<script type="text/javascript">
    <Route exact path="index.php" 
  render={props => 
  isAuthenticated()?(<DashboardContainer {...props} />):(<Redirect to="login.php" />) }/>
</script>
</body>
</html>
 