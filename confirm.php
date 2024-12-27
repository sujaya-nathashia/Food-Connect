<?php

include 'config.php';

if(isset($_POST['submit2'])){

   $pas=$_POST['p1'];
   $ad='admin';
        $p3= mysqli_query($conn, "SELECT * FROM `adp` WHERE admin='$ad'") or die('query failed');
        $row=mysqli_fetch_array($p3);
        $p4=$row['admin_pass'];
    

   
     if($pas==$p4)
      {
        header('location:admin_reg.php');
        
  
      }
      else
      {
        echo "<script>alert('Wrong Password')</script>";
         echo "<script>window.open('register.php','_self')</script>";

   
            
      }

   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

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
      <h3>ADMIN COFIRMATION</h3>
      <input type="password" name="p1" placeholder="enter admin password" required class="box">
      <input type="submit" name="submit2" value="Confirm" class="btn">
      
   </form>

</div>

</body>
</html>