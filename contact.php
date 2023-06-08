<?php require_once('functions/initialize.php')?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <?php require_once('allpages/head.php'); ?>
   </head>
   <!-- body -->
   <body class="main-layout">
   
   <?php require_once('allpages/header.php'); ?>  
   
   <?php require_once('functions/initialize.php')?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <?php require_once('allpages/head.php'); ?>
   </head>
   <!-- body -->
   <body class="main-layout">
   
   <?php require_once('allpages/header.php'); ?>  
    <?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
        if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
          $subject_error = 'Invalid subject';
        }
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(strlen($message) === 0){
          $message_error = 'Your message should not be empty';
        }
      }
    ?>
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
					  
                     <h2>Neem contact op</h2>
                  </div>
               </div>
               <div class="col-md-6 offset-md-3">
                  <form class="main_form" role="form" opacity="0.2" data-stellar-background-ratio="0.5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
     
      <input class="contactus" type="text" name="name"  placeholder="Your Name" >
      <p><?php if(isset($name_error)) echo $name_error; ?></p>
     
      <input class="contactus" type="text" name="subject"  placeholder="subject" >
      <p><?php if(isset($subject_error)) echo $subject_error; ?></p>
     
      <input class="contactus" type="text" name="email"  placeholder="E-mail" >
      <p><?php if(isset($email_error)) echo $email_error; ?></p>
     
      <textarea class="contactus" name="message"  rows="5" placeholder="Message" ></textarea>
      
      <p ><?php if(isset($message_error)) echo $message_error; ?></p>
      <input  class="send_btn" type="submit"  type="submit" name="submit" value="Submit" >
      <?php 
        if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
          $to = 'info@thechallengezone.nl'; // edit here
          $body = " Name: $name\n E-mail: $email\n Message:\n $message";
          if(mail($to, $subject, $body)){
            echo '<p style="color: green">Message sent</p>';
          }else{
            echo '<p>Error occurred, please try again later</p>';
          }
        }
       
      ?>
      
 </form>
               </div>
            </div>
         </div>
      </div>
     
      <?php require_once('allpages/footer.php'); ?>
   </body>
</html>


     
      <?php require_once('allpages/footer.php'); ?>
   </body>
</html>

