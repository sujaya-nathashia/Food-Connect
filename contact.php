<?php

include 'config.php';

session_start();



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="chatbot.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body>
    <header>
        <div class="logo">Food <b style="color: #06C167;">Connect</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
            <?php

            if(!isset($_SESSION['user_id'])){
            echo"<li><a href='login.php' class='active'>Login</a></li>";

                }
            else{
                $user_id=$_SESSION['user_id'];
            echo"<li><a href='logout.php' class='active'>Logout</a></li>";
            echo"<li><a href='orders.php'>Orders</a></li>";
                }
            ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
                <li><a href="profilee.php">Profile</a></li>
            </ul>
            </nav>
            <?php if(isset($_SESSION['user_id'])) { 
            echo"<div class='icons'>
            <div id='menu-btn' class='fas fa-bars'></div>";
            
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
           
            echo"<a href='cart.php'> <i class='fas fa-shopping-cart'></i> <span>$cart_rows_number</span> </a>
         </div>";
            }
         ?>
        
    </header>

    <script>
        const hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            const navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->


    <section class="cover">

    </section>
    <p class="heading" style="margin: 20px;">Contact Us</p>

    <div class="container px-4 mt-4">
      <div class="row gx-4 justify-content-center">


<form method="POST" action="https://formpost.app/shanenoronha133@gmail.com">
<input type="hidden" name="fp_redirect" value="http://formpost.app/thankyou" >
<input type="hidden" name="fp_webhook" value="https://webhook.site/0c2277a7-ad9a-47ed-90e3-cc57cc2afe26" >

<div class="form-group row">
<label for="fullname" class="col-4 col-form-label">Fullname</label> 
<div class="col-8">
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <i class="fa fa-address-card"></i>
    </div>
  </div> 
  <input id="fullname" name="fullname" type="text" class="form-control">
</div>
</div>
</div>
<div class="form-group row">
<label for="email" class="col-4 col-form-label">Email</label> 
<div class="col-8">
<input id="email" name="email" type="text" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="message" class="col-4 col-form-label">Mesage</label> 
<div class="col-8">
<textarea id="message" name="message" cols="40" rows="5" class="form-control"></textarea>
</div>
</div> 
<div class="form-group row">
<div class="offset-4 col-8">
<button name="submit" type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
<p><a href="message.php">Message Admin</a></p>
            </div>
        </div>
</div>
</div>

    <div class="contact-info" style="padding: 10px;">
        <p>Email: foodConnect@gmail.com</p>
        <p>Phone: 555-555-5555</p>
        <p>Address: 123 Main St, Anytown</p>
    </div>

    <div class="chatbot" style="padding: 30px; background-color: rgba(151, 243, 199, 0.5);">
        <p style="font-size: 23px; text-align: center;">Chat Bot Support <img src="img/bot-mini.png" alt="" height="20"></p>
        <div id="container" class="container">
            <div id="chat" class="chat">
                <div id="messages" class="messages"></div>
                <input id="input" type="text" placeholder="Say something..." autocomplete="off" />
            </div>
        </div>
        <div class="help">
            <p style="font-size: 23px; text-align: center; padding:10px;">Help & FAQs?</p>

            <button class="accordion">How to Connect food?</button>
            <div class="panel">
                <p>1) Click on <a href="fooddonate.html">Doonate Food</a> in the home page</p>
                <p>2) Fill in the details</p>
                <p>3) Click on submit</p>
                <img src="img/mobile.jpg" alt="" width="100%">
            </div>

            <button class="accordion">How will my donation be used?</button>
            <div class="panel">
                <p style="padding: 10px;"> Your donation will be used to support our mission and the various programs and initiatives that we have in place. Your donation will help us to continue providing assistance and support to those in need. You can find more information about our programs and initiatives on our website. If you have any specific questions or concerns, please feel free to contact us.</p>
            </div>

            <button class="accordion">What should I do if my food donation is near or past its expiration date?</button>
            <div class="panel">
                <p style="padding: 10px;">We appreciate your willingness to Connect, but to ensure the safety of our clients, we can't accept food that is near or past its expiration date. We recommend checking expiration dates before making a donation or contacting us for further guidance.</p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="chatbot.js"></script>
    <script type="text/javascript" src="constants.js"></script>
    <script type="text/javascript" src="speech.js"></script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>
