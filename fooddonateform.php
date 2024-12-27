<?php
// Establish MySQL database connection (assuming default settings for XAMPP)
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password
$dbname = "food_donations"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data upon submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $foodname = $_POST['foodname'];
    $meal = $_POST['meal'];
    $category = $_POST['image-choice'];
    $quantity = $_POST['quantity'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    
    $select_product_name = mysqli_query($conn, "SELECT foodname,quantity FROM `items` WHERE foodname = '$foodname'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
    $fetch = mysqli_fetch_assoc($select_product_name);
    $quantity1=$quantity+$fetch['quantity'];
    mysqli_query($conn, "UPDATE `items` SET quantity = '$quantity1' where foodname='$foodname'") or die('query failed');
    header('location:index.php?h');
   }

   else{
    mysqli_query($conn, "INSERT INTO `items` (foodname, meal, quantity, category) VALUES ('$foodname', '$meal', '$quantity', '$category')") or die('query failed');
    
   }
   
    // SQL insert statement
    $sql = "INSERT INTO donations (foodname, meal, category, quantity, email, phoneno, district, address)
            VALUES ('$foodname', '$meal', '$category', '$quantity', '$email', '$phoneno', '$district', '$address')";
   
    if ($conn->query($sql) === TRUE) {
        
        header('location:index.php?h');
    }
       
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQL connection
$conn->close();
?>

<!-- Your HTML form -->
<form action="fooddonateform.php" method="post">
    <!-- Your existing form elements -->
    <!-- Ensure all form elements have appropriate names (like foodname, meal, image-choice, etc.) -->
</form>
