<?php

include 'config.php';

session_start();



if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

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
                <li><a href="message.php" class="active">Message</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php" >Contact</a></li>
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
   <link rel="stylesheet" href="style.css">


</head>
<body>

<div class="heading">
   <h3>contact us</h3>
   <p> <a href="index.php">Home</a> / Contact </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="Enter your name" class="box">
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="number" name="number" required placeholder="Enter your number" class="box">
      <textarea name="message" class="box" placeholder="Enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Send Message" name="send" class="btn">
   </form>

</section>










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>