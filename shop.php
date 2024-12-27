<?php

include 'config.php';

session_start();



if(isset($_POST['add_to_cart'])){
   $user_id = $_SESSION['user_id'];

   if(!isset($user_id)){
      header('location:login.php');
   }
   else{
   $product_name = $_POST['product_name'];
   $meal = $_POST['meal'];//meal
   $category = $_POST['category'];//category
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, meal, quantity, category) VALUES('$user_id', '$product_name', '$meal', '$product_quantity', '$category')") or die('query failed');
      $message[] = 'product added to cart!';
   
   }
   }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="chatbot.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
       <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
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
                <li><a href="shop.php" class="active">Shop</a></li>
                <li><a href="message.php" >Message</a></li>
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
   <link rel="stylesheet" href="css/style.css">
   <style>
      .image{
         width: 300px;
         height: 30rem;
         object-fit: contain;
         margin:auto;
      }
      

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
   <h3>our shop</h3>
   <p> <a href="index.php">Home</a> / Shop </p>
</div>

<section class="products">

   <h1 class="title">Latest Food</h1>

   <div class="row ">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `items` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?><div class="col-md-6 m-auto p-0">
     <form action="" method="post" class="box">
      <div class="name"><h1><?php echo $fetch_products['foodname']; ?></h1></div>
      <div class="price"><h1><?php echo $fetch_products['meal']; ?></h1></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['foodname']; ?>">
      <input type="hidden" name="meal" value="<?php echo $fetch_products['meal']; ?>">
      <input type="hidden" name="category" value="<?php echo $fetch_products['category']; ?>">
      <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
     </form>
     </div>
      <?php
         }
      }else{
         echo '<p class="empty">No Food Added Yet!</p>';
      }
      ?>
   </div>

   </section>

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








<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>