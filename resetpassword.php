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
            <h3>Reset Password</h3>
          <div class="field">
              <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if(empty($selector) || empty($validator)){
                  echo "Could not validate your request!";
                }else{
                  if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                    ?>

                    <form method="POST" action="reset.php">
                      <input class="is-hidden" name="selector" value="<?php echo $selector ?>">
                      <input class="is-hidden"  name="validator" value="<?php echo $validator ?>">
                      <label class="label">New Password</label>
                          <div class="control has-icons-left has-icons-right">
                          <input class="input" type="password" name="pwd">
                          <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                          </span>
                          </div>
                      </div>
                      <label class="label">Confirm New Password</label>
                          <div class="control has-icons-left has-icons-right">
                          <input class="input" type="password" name="pwd-repeat">
                          <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                          </span>
                          </div>
                      </div>
                      <input class="button is-success" type="submit" name="resetSubmit" value="Submit">
                    </form>

                    <?php
                  }
                }
              ?>
         
          </div>
        </div>
      </div>
    </div>
  <div class="column is-7">
    </div>
</div>
</section>
<footer class="footer fixed-bottom"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
    <div class="content has-text-centered">
    <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>
</body>
</html>