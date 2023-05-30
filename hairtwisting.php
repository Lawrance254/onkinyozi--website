<!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orders Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    *{
  box-sizing: border-boxs;

}
body{
  background-color: white;
}

.conte-nt h2{
  padding: 15px 0;
  font-size: 22px;
  border-bottom: 2px solid turquoise;
  color: turquoise;
}
.conte-nt > p, .conte-nt > div{
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
  margin: 25px 0;
  padding: 5px;
  background-color: #fff;
}

.conte-nt > div .he-ad{
  padding: 5px;
  margin: 0 0 10px 0;
  color: turquoise;
  font-weight: bold;
  font-size: 20px;
  margin-left: 30%;
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
     
      padding: 6px 80px;
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
     form input, form textarea{
      width: 80%;
      border-right: none;
      border-top: none;
      border-left: none;
      outline: none;
      background-color: none;
      border-bottom-color: turquoise;
      margin: 10px 0;
      color: turquoise;
      font-size: 10px;

     }
     form input, form textarea:hover{
      
     }
     #submit{
      padding: 8px 20px;
     }
     .contact-right{
       box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
        margin: 130px auto 0;
        padding: 80px;
        background-color: #fff;
        width: 40%;


     }
     .copyright{
  width: 100%;
  text-align: center;
  padding: 15px 0;
  background:  linear-gradient(91.9deg, rgb(93, 248, 219) 27.8%, rgb(33, 228, 246) 67%);
  font-weight: 300;
  margin-top: 6.6%;
}
.copyright p{
  color: white;
  font-weight: 300;
}
#msg{
  color: turquoise;
  display: block;

}
.navtop{
  background-color: #2f3947;
  height: 60px;
  width: 100%;
  border: 0;
}
.navtop div{
  display: flex;
 margin-left: 10%;
  width: 500px;
  height: 80%;
}
.navtop div h1, .navtop div a{
  display: inline-flex;
  align-items: center;
}
.navtop div h1{
  flex: 1;
  font-size: 24px;
  padding: 0;
  margin: 0;
  color: #c1c4c8;
  font-weight: bold;
}
.navtop div a{
  padding: 0 20px;
  text-decoration: none;
  color: #c1c4c8;
  font-weight: bold;
}
.navtop div a:hover{
  color: #eaebed;
}
.info{
  display: flex;
  
}
.navbar{
  text-align: center;
  flex: 1;
  background-color: turquoise;


}
.navbar li{
  list-style: none;
}
.navbar li a{
  text-decoration: none;
  font-weight: bold;
  margin-left: 80%;

}
.nav{
  background-color: turquoise;
  height: 60px;
  width: 100%;
  border: 0;
}

.cont-ainer{
  width: 100%;
  min-height: 60vh;
  padding-right: 8%;
  padding-left: 8%;
  box-sizing: border-box;
  overflow: hidden;
}
.contact-right a{
  text-decoration: none;
  font-size: 8px;
}
.service-type p{
  color: turquoise;
  text-align: center;
  font-weight: 700;
  font-size: 25px;

}
  </style>
 </head>
 <body>
   <div class="conte-nt">
    <center><h2>Hair Twisting Page</h2></center>
    <div class="service-type">
      <p>Order Our Services Now!</p>
      
    </div>
    </div>
     <div class="cont-ainer">
             
     <div class="contact-right">
            <form action="connecthairtwisting.php" method="POST">
               <img src="t8.png" width="19px"><input type="text" name="username" id="username" placeholder="Your name" required> <br><img src="t7.png" width="15px">
            <input type="text" name="phone" id="phone" placeholder="Your phone number" required><br><img src="t9.png" width="15px">
              <input type="email" name="email" id="email" placeholder="Your email" required><br><img src="t16.png" width="13px">
              <input type="text" name="place" id="place" placeholder="Place" required><br><img src="t11.png" width="15px">
              <input type="date" name="date" id="date" required><br><br>
              <input type="submit" name="submit" id="submit" value="Submit"><br><br><br><a href="index.php" id="submit">Home</a>
            </form>
            <span id="msg"></span>
          </div>
          </div>
          <div class="copyright">
   <p>Copyright &copy 2023, All Rights conserved<img src="t13.png" width="17px"></p>
  </div>
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
 </body>
 </html>