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
    <title>Profile</title>
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
        echo"<li><a href='orders.php'>Orders</a></li>";
            }
        ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="profilee.php" class="active">Profile</a></li>
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

<div class="profile">
    

        
        <?php
        // Check if form is submitted and process input
        if(isset($_SESSION['user_id'])){
        
            // Include your database connection script
            include("login1.php");

            // Sanitize and validate input (not shown here for brevity, but essential in real-world applications)
            $email = $_SESSION['user_email'];

            // Fetch donations for the provided email
            $query = "SELECT * FROM donations WHERE email='$email'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                echo "<div class='table-container'>";
                echo "<div class='table-wrapper'>";
                echo "<table class='table'>";
                echo "<thead><tr><th>Food</th><th>Quantity</th><th>Date/Time</th><th>Status</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['foodname'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['submission_date'] . "</td>";
                    echo "<td>Processing/Completed</td>"; // Adjust based on your status field
                    echo "</tr>";
                }
                echo "</tbody></table></div></div>";
            } else {
                echo "Error retrieving donations: " . mysqli_error($connection);
            }

            // Close connection
            mysqli_close($connection);
        }
        else{
            echo "<script>alert('PLEASE LOGIN')</script>";
        }
        ?>
        
    </div>
</div>
</body>
</html>
