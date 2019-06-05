<?php
  session_start();

  include('db.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT * FROM users WHERE email = ? and password = ?";
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($statement, 'ss', $email, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    
    $count = mysqli_num_rows($result);   
  
    if($count == 1) {
       session_start();
       $user = mysqli_fetch_assoc($result);
       $_SESSION["email"] = $user['email'];
       $_SESSION["username"] = $user['username'];
       $_SESSION["rank"] = $user['rank'];
       $_SESSION["status"] = $user['status'];
       $_SESSION["userID"] = $user['userID'];

       header("location:index.php");
    }else {
      header("location:login.php?msg=failed");
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
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Forums
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item"> <!-- href="index.php/forum/updates"-->
            Updates
          </a>
          <a class="navbar-item"> <!-- href="index.php/forum/community"-->
          Technical Discussions
          </a>
          <a class="navbar-item"> <!-- href="index.php/forum/reports"-->
            Reports
          </a>
          <a class="navbar-item"> <!-- href="index.php/forum/feedback"-->
            Feedback
          </a>
        </div>
      </div>
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
            <h3>Log In</h3>
          <div class="field">
          <form method="POST" action="login.php">
            <?php
              if (isset($_GET["msg"]) && $_GET["msg"] == 'failed'){
              echo "<div class=\"notification is-danger\">
              <button class=\"delete\"></button>
              <strong>Authentication Failed!</strong> Email and password did not match!
              </div>";
              }else if (isset($_GET["msg"]) && $_GET["msg"] == 'passwordupdated'){
                echo "<div class=\"notification is-success\">
                <button class=\"delete\"></button>
                Password has been reset! Try loggin in.
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
            <label class="label">Password</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input" type="password" name="password">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
            <label class="checkbox">
              <input type="checkbox" name="remember">
              Remember Me
            </label>
              <a href="./forgotpassword.php" class="forgot-password" name="forgotPass">Forgot password?</a>
            </div>
            <input class="button is-success" type="submit" value="Log In">
            <a href="signup.php" class="signup-member">Not a member? <u>Click here to sign up.</u></a>
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