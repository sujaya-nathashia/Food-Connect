<?php

include 'config.php';

session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="about.php" >About</a></li>
                <li><a href="contact.php" >Contact</a></li>
                <li><a href="profilee.php" >Profile</a></li>
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
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
    <section class="banner">
        <a href="fooddonate.html">Donate Food</a>
    </section>
    <div class="content">
        <!-- <h2>Love Food</h2>
        <h3>Hate Wasting</h3> -->
        <p style="font-size: 23px;">
            “Cutting food waste is a delicious way of saving money, helping to feed the world and protect the planet.” 
        </p>
       
    </div>
    <div class="photo">
        <br>
        <p class="heading">Our Works</p>
        <br>
        <p style="font-size: 28px; text-align: center;">"Look what we can do together."</p>
       <br>
        <div class="wrapper">
          <div class="box"><img src="img/p1.jpeg" alt=""></div>
          <div class="box"><img src="img/p4.jpeg" alt=""></div>
          <div class="box"><img src="img/p3.jpeg" alt=""></div>
        </div>
       <!--   <p style="font-size: 19px;"> The basic concept of this project  Food Waste Management is to collect theexcess/leftover food from donors such as hotels, restaurants, marriage halls, etc and distribute to  the  needy people .
        </p> -->
        
    </div>
    
      <div class="deli" style="display: grid;" >
      <p class="heading">DOOR PICKUP</p>
      <br>
      <p  class="para">"Your Connect will be immediately collected and sent to needy people "</p>
      <img src="img/delivery.gif" alt="" style="margin-left:auto; margin-right: auto;">

    </div>
 <!--   <div class="ser">
      <p class="heading">Our Services</p>
      
    </div> -->
    
    <footer class="footer">
        <div class="footer-left col-md-4 col-sm-6">
          <p class="about">
            <span> About us</span>The basic concept of this project  Food Waste Management is to collect the excess/leftover  food from donors such as hotels, restaurants, marriage halls , etc and distribute to  the  needy people .
     </p>
        
        </div>
        <div class="footer-center col-md-4 col-sm-6">
          <div>
            <p><span> Contact</span> </p>
            
          </div>
          <div>
        
            <p> (+00) 0000 000 000</p>
            
          </div>
          <div>
        
            <p><a href="#"> FoodConnect@gmail.com</a></p>
          </div>
          <div class="sociallist">
            <ul class="social">
            <li><a href="#"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
            <li><a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
            <li><a href="#"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
            <li><a href="https://github.com/kishor-23"><i class="fa fa-github" style="font-size:50px;color: black;"></i></a></li>
           </ul>
          </div>
        </div>
        <div class="footer-right col-md-4 col-sm-6">
          <h2> Food<span> Connect</span></h2>
          <p class="menu">
            <a href="#"> Home</a> |
            <a href="about.php"> About</a> |
            <a href="#"> Services</a> |
            <a href="contact.php"> Contact</a>
          </p>
          <p class="name"> Food Connect &copy; 2023</p>
        </div>
      </footer>

    
</body>
</html>
