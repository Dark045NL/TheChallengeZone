<?php
   // Start session
   session_start();
   
   // Check if user is logged in
   if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
       header('location: login.php');
       exit;
   }
   
   // User is logged in, display profile page

   session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
   <?php require_once('allpages/head.php'); ?>
   </head>
   <!-- body -->
    <body class="main-layout">

         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img class="foto" src="images/logo.png" alt="#" /></a>
                              <a href="https://webmail.thechallengezone.nl/roundcube/index.php"><img class="mail" src="images/mail.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
    </body>
</html>