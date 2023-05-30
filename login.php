
<?php

session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['CREATED'] < 3600) {
        header('Location: index.php');
        exit;
    }

    unset($_SESSION['username']);
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login page</title>
	<style type="text/css">
		body{
			background: white;
		}
		#form{
			background: whitesmoke;
			width: 40%;
			padding: 10px;
			margin: 120px auto 0;
			border-radius: 20px;
		}
		.p{
			color: turquoise;
			font-size: 16px;
			margin-left: 40%;
		}
		img{
       margin-left: 44%;
		}
		p{
			margin-left: 32%;
		}
		p a{
			text-decoration: none;
			color: turquoise;
		}
		#username{
			margin-left: 15%;
			width: 70%;
			padding: 9px;
			border-radius: 10px;
			outline-color: turquoise;
			color: turquoise;
			border-bottom-color: turquoise;
			border-top-color: turquoise;
			border: turquoise;
			border-right-color: turquoise;
		}
		#password{
			margin-left: 15%;
			width: 70%;
			padding: 9px;
			border-radius: 10px;
			outline-color: turquoise;
			color: turquoise;
			border-bottom-color: turquoise;
			border-top-color: turquoise;
			border: turquoise;
			border-right-color: turquoise;
		}
		#submit{
			margin-left: 30%;
			padding: 8px 30px;
			background: turquoise;
			border-radius: 10px;
			color: white;
			cursor: pointer;
			border: turquoise;
		}
		@media only screen and (max-width: 660px){
			#submit{
				margin-left: 16%;
				padding: 8px 30px;
				width: 78%;
			}
			.p{
				font-size: 10px;
			}
			img{
				width: 20px;
				margin-left: 45%;
			}
		}

	</style>
</head>
<body>
	<div id="form">
			<img src="logo.png" width="50px">
		<p class="p">Online-Kinyozi</p>
  <form name="form" action="loginaccount.php" method="POST" onSubmit="return validate();">
  	              <?php
                if (isset($_SESSION["username"])) {
                    ?>
                <div class="error-message"><?php  echo $_SESSION["username"]; ?></div>
                <?php
                    unset($_SESSION["username"]);
                }
                ?>
                <div class="field-column">
					<div>
						<label for="username"></label><span id="user_info"
							class="error-info"></span>
					</div>
              <div>
              	<input type="username"  id="username" name="username" class="demo-input-box" placeholder="Username" required>
              </div><br>


                    <div> 
						<label for="password"></label><span id="password_info"
							class="error-info"></span>
					</div>

					<div>
						<input type="password" id="password" class="demo-input-box" placeholder="Password" name="password"  required><br>
					</div>



  		
  		<input type="checkbox" onclick="myFunction()" style="margin-left: 20%;">Show Password<br><br>
  	<input type="submit" name="submit" id="submit" value="Login"><a style="margin-left: 6%; text-decoration: none; color: turquoise; font-weight: bold; " href="ownerslogin.php"> Staff</a>
  	<p> Don't have an account? <a href="sign.php">Sign up</a></p>
  </form>
  </div>
  <script type="text/javascript">
  	function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  <script type="text/javascript">
   function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>
 <!------------(?=.*\d)(?=.*[a-z])------------->
</body>
</html>