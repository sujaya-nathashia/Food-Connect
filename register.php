<?php

include 'config.php';

if(isset($_POST['submit'])){
   $ty=$_POST['user_type'];
   if($ty=='admin')
   {
      header('location:confirm.php');

   }
   else{
      header('location:user_reg.php');
   }
   


   

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

   
<div class="form-container">

   <form action="" method="post">
      <h3>SELECT LOGIN MODE</h3>
      <select name="user_type" class="box">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register now" class="btn">
   </form>

</div>

</body>
</html>