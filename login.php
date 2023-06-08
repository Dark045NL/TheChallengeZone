<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once('allpages/head.php'); ?>
   </head>
   <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img class="foto" src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
   <body class="main-layout">
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Login</h2>
                  </div>
               </div>
               <div class="col-md-6 offset-md-3">
               <?php
   // Start session
   session_start();
   
   // Check if user is already logged in
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
       header('location: loggedin.php');
       exit;
   }
   
   // Check if form submitted
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
       // Retrieve form data
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       // Connect to database
       $conn = mysqli_connect("localhost", "root", "", "thechallengezone");
   
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }
   
       // Prepare SQL statement
       $sql = "SELECT id FROM user WHERE username = ? AND password = ?";
   
       if ($stmt = mysqli_prepare($conn, $sql)) {
   
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ss", $username, $password);
   
           // Execute the prepared statement
           mysqli_stmt_execute($stmt);
   
           // Store result
           mysqli_stmt_store_result($stmt);
   
           // Check if username and password are valid
           if (mysqli_stmt_num_rows($stmt) == 1) {
               // Login successful
               session_start();
               $_SESSION['loggedin'] = true;
               $_SESSION['username'] = $username;
               header('location: loggedin.php');
           } else {
               // Invalid username or password
               $login_error = "Invalid username or password";
           }
   
           // Close statement
           mysqli_stmt_close($stmt);
   
       } else {
           // Error with SQL statement
           $login_error = "Oops! Something went wrong. Please try again later.";
       }
   
       // Close connection
       mysqli_close($conn);
   }
?>

                  <form id="request" class="main_form" method="post"> 
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Username" type="type" name="username" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Password" type="type" name="password" required> 
                        </div>
                        <div class="col-sm-12">
                           <button class="send_btn" type="submit">Verstuur</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>