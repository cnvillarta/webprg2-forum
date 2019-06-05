<?php

if(isset($_POST['forgotsubmit'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = 'http://localhost/webprg2/warframe%20forum/resetpassword.php?selector=' . $selector . 
    '&validator=' . bin2hex($token);
    
    $expires = date("U") + 1800;

    require('db.php');

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo 'There was an error';
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo 'There was an error';
      exit();
    }else{
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    require 'PHPMailer/PHPMailerAutoload.php';
    require('PHPMailer/class.phpmailer.php');



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
  
  $mail->addAddress($userEmail);
  
  $mail->isHTML(true);
  
  $mail->Subject = "Change Password for Warframe Forum";
  $mail->Body = '<p>We recieved a password reset request. The link to reset your password is below, if you did not make this request, you can ignore this email. 
  <br>Here is your password reset link: </br>
  <a href ="' . $url . '">' . $url . '</a></p>';
  
  if(!$mail->send()) 
  {
    header("location:forgotpassword.php?msg=failed");
  } 
  else 
  {
    header("location:forgotpassword.php?msg=success");
  }
    

  }else{
    header("Location: ./login.php");
  }