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

if(isset($_GET['h'])){
   echo "<style> .header .flex .navbar .ha{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['p'])){
   echo "<style> .header .flex .navbar .pa{font-size: 2.5rem;
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['o'])){
   echo "<style> .header .flex .navbar .oa{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['u'])){
   echo "<style> .header .flex .navbar .ua{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['m'])){
   echo "<style> .header .flex .navbar .ma{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['c'])){
   echo "<style> .header .flex .navbar .ca{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php?h" class="ha"><b>Home</b></a>
         <a href="admin_orders.php?o" class="oa"><b>Orders</b></a>
         <a href="admin_users.php?u" class="ua"><b>Users</b></a>
         <a href="admin_contacts.php?m" class="ma"><b>Messages</b></a>
         <a href="admin_pass.php?c" class="ca"><b>Change Admin Password</b></a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Logout</a>
         <div>new <a href="login.php">Login</a> | <a href="register.php">Register</a></div>
      </div>

   </div>

</header>