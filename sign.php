<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign-up page</title>
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
		@media only screen and (max-width: 450px){
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
  <form action="connectsignup.php" method="POST">
  	<input type="username" name="username" id="username" placeholder="Username" required><br><br>
  		<input type="password" id="password" placeholder="Password" name="password"  required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least  8 characters,a number, a punctuation mark and uppercase letter"><br><input type="checkbox" onclick="myFunction()" style="margin-left: 20%;">Show Password<br><br>
  	<input type="submit" name="submit" id="submit" value="Signup">
  	<p> Have an account? <a href="login.php">Login</a></p>
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
 <!------------(?=.*\d)(?=.*[a-z])------------->
</body>
</html>


