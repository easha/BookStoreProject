<html>
    <head>
        <title>Bookworms</title>
    </head>
   <?php
   session_start(); 
   if($_SESSION['user']){ 
   }
   else{
      header("location: Index.php"); 
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
    <body>
        <h2>Home Page</h2>
        
<p>Hello<?php Print "$user"?>!</p>

        <a href="Logout.php">Click here to go logout</a><br/><br/>
        
   

<body>
</html>
