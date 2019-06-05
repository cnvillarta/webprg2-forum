<?php
require_once('db.php');
require 'PHPMailer/PHPMailerAutoload.php';
require('PHPMailer/class.phpmailer.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $email = mysqli_real_escape_string($conn,$_POST['email']);
  
  $sql = "SELECT * FROM users WHERE email = ?";
  $statement = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($statement, 's', $email);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);
  
  $count = mysqli_num_rows($result);   

  if($count == 1){
  $user = mysqli_fetch_assoc($result);

  require_once "vendor/autoload.php";
  
  $mail = new PHPMailer;
  
  //Enable SMTP debugging. 
  //$mail->SMTPDebug = 3;                               
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();            
  //Set SMTP host name                          
  $mail->Host = "smtp.gmail.com";
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = true;                          
  //Provide username and password     
  $mail->Username = "kurokonero@gmail.com";                 
  $mail->Password = "dreamhouse";                           
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "tls";                           
  //Set TCP port to connect to 
  $mail->Port = 587;                                   
  
  $mail->From = "kurokonero@gmail.com";
  $mail->FromName = "WEBPROG2 WARFRAME";
  
  $mail->addAddress($email);
  
  $mail->isHTML(true);
  
  $mail->Subject = "Subject Text";
  $mail->Body = "Your password is " .$user['password'];
  
  if(!$mail->send()) 
  {
    header("location:forgotpassword.php?msg=failed");
  } 
  else 
  {
    header("location:forgotpassword.php?msg=success");
  }

}else{
  header("location:forgotpassword.php?msg=doesnotexist");
  }
}
?>

<!DOCTYPE html>
<html lang="en" class="has-login-bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="index.scss">
    <script src="js/burgermenu.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="shortcut icon" href="images/warframe_logo_1__GaU_icon.ico" />
    <title>WARFRAME</title>
</head>
<body class="has-navbar-fixed-top scroll-hidden">
<nav class="navbar is-fixed-top is-transparent is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="images/warframe logo.png" >
      <img src="images/warframe.png" width="160" height="54">
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  
  <div id="navbarBasicExample" class="navbar-menu">
  <div class="navbar-start">
      <a class="navbar-item" href="https://www.warframe.com/game#keyart">
        Story
      </a>
      <a class="navbar-item" href="https://www.warframe.com/?category=pc">
        News (PC)
      </a>
      <a class="navbar-item" href="https://warframe.fandom.com/wiki/WARFRAME_Wiki">
        Wikia
      </a>
      <a class="navbar-item" href="https://www.warframe.com/prime-access">
        Prime Access
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="signup.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<br>
<section class="is-centered-left">
<div class="container">
  <div class="columns is-vcentered">
    <div class="column is-5 adjust-left">
    <div class="box">
      <div class="box-content">
        <div class="content">
            <h3>Forgot Password</h3>
          <div class="field">
          <form method="POST" action="forgot.php">
          <?php
              if (isset($_GET["msg"]) && $_GET["msg"] == 'success'){
              echo "<div class=\"notification is-success\">
              <button class=\"delete\"></button>
              Email Sent. Check your email.
              </div>";
              }else if(isset($_GET["msg"]) && $_GET["msg"] == 'failed'){
                echo "<div class=\"notification is-danger\">
                <button class=\"delete\"></button>
                Failed to recover your password. Try again.
                </div>";
                }else if(isset($_GET["msg"]) && $_GET["msg"] == 'doesnotexist'){
                echo "<div class=\"notification is-danger\">
                <button class=\"delete\"></button>
                Email does not exist in the database.
                </div>";
                }
            
            ?>
            <label class="label">Email Address</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" name="email">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <input class="button is-success" name="forgotsubmit" type="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  <div class="column is-7">
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
</section>
<footer class="footer fixed-bottom"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
    <div class="content has-text-centered">
    <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>
</body>
</html>