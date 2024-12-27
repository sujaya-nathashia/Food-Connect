<?php

include 'config.php';
session_start();



    if(isset($_POST['submit1'])){


        $ad='admin';
        $p= mysqli_query($conn, "SELECT * FROM `adp` WHERE admin='$ad'") or die('query failed');
        $row=mysqli_fetch_array($p);
        $pass=$row['admin_pass'];
        $pp=$_POST['pass'];

        if($pass==$pp)
        {
            $ad1='admin';
         $pass1=$_POST['pass1'];
        $res= mysqli_query($conn,"UPDATE `adp` SET admin_pass='$pass1' WHERE admin='$ad1'");
        if($res)
        {
            echo "<script>alert('Password changed Successfully')</script>"; 
            echo "<script>window.open('admin_page.php','_self')</script>";
        }
     
        }
        else
        {
         echo "<script>alert('Old Password does not match')</script>";
         echo "<script>window.open('admin_pass.php','_self')</script>";
        }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Pass Change</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>CHANGE ADMIN PASSWORD</h3>
      <input type="password" name="pass" placeholder="enter your old password" required class="box">
      <input type="password" name="pass1" placeholder="enter the new password" required class="box">
      <input type="submit" name="submit1" value="Change" class="btn">
      
   </form>

</div>

</body>
</html>