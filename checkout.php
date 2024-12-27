<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');


   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email'  AND address = '$address'") or die('query failed');

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, address, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$address', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <div class="logo">Food <b style="color: #06C167;">Donate</b></div>
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
            }
        ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="orders.php" class='active'>Orders</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="profilee.php" class="active">Profile</a></li>
        </ul>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
    
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
   <link rel="stylesheet" href="css/style.css">
   <style>

.heading{
   min-height: 30vh;
   display: flex;
   flex-flow: column;
   align-items: center;
   justify-content: center;
   gap:1rem;
   background: url(./images/veg3.jpg) no-repeat;
   background-size: cover;
   background-position: center;
   text-align: center;
}

   </style>

</head>
<body>

<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">Home</a> / Checkout </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   
</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         
         <div class="inputBox">
            <span>Address Line 01 :</span>
            <input type="number" min="1"  name="flat" required placeholder="e.g. flat no.">
         </div>
         <div class="inputBox">
            <span>Address Line 01 :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" required placeholder="e.g. mumbai">
         </div>
         <div class="inputBox">
            <span>State :</span>
            <input type="text" name="state" required placeholder="e.g. maharashtra">
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         <div class="inputBox">
            <span>Pin Code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>

</section>










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>