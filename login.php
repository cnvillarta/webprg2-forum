<?php
    session_start();
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
<body class="has-navbar-fixed-top">
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
            Community
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
          <a class="button is-light" href="signin.php">
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
            <label class="label">Email Address</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input" type="email" placeholder="example@outlook.com" name="email">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-asterisk"></i>
              </span>
            </div>
            <label class="label">Password</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input" type="password" placeholder="************" name="password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-asterisk"></i>
              </span>
            </div>
              <label class="checkbox">
                <input type="checkbox">
                Remember Me
              </label>
              <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            <a class="button is-info">Log In</a>
            <a href="signup.php" class="signup-member">Not a member? <u>Click here to sign up.</u></a>
          </div>
        </div>
      </div>
    </div>
  <div class="column is-7">
    </div>
</div>
</section>
</body>
</html>