<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
         width: 250px;
         object-fit: contain;
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
   <h3>shopping cart</h3>
   <p> <a href="home.php">Home</a> / Cart </p>
</div>

<section class="shopping-cart">

   <h1 class="title">products added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" name="update_cart" value="update" class="option-btn">
         </form>
         
      </div>
      <?php
      
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn " onclick="return confirm('delete all from cart?');">Delete All</a>
   </div>

   <div class="cart-total">
      
      <div class="flex">
         <a href="shop.php" class="option-btn">Continue Shopping</a>
         <a href="checkout.php" class="btn ">Proceed To Checkout</a>
      </div>
   </div>

</section>










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>