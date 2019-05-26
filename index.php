<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
<nav class="navbar is-fixed-top is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="images/warframe logo.png">
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
          <a class="button is-light" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<section class="hero is-dark is-medium has-bg-img">
  <div class="hero-body">
    <div class="container">
    </div>
  </div>
</section>

<!-- CONTENT -->
<section class="main-content columns is-fullheight">
  <div class="container column is-8">
    <div class="section">
      <div class="card">
          <div class="card-header is-header-dark">
            <p class="card-header-title is-header-title-dark">
              <i class="fas fa-newspaper fa-sm" aria-hidden="true"></i>
              &nbsp;Updates</p>
              <a href="#" class="card-header-icon" aria-label="more options">
                <span class="new-post">
                  <i class="fas fa-plus" aria-hidden="true"></i>
                </span>
              </a>
          </div>
          <div class="card-content">
            <div class="content">
              <div class="is-card-content-first">
                <span class="card-icon">
                  <i class="fas fa-comments fa-lg" aria-hidden="true"></i>
                </span>
                <h5><a href="#" class="redirect-link">Announcements</a></h5>
              </div>
              <div class="content">
                <div class="is-card-content-next">
                  <span class="card-icon">
                    <i class="fas fa-comments fa-lg" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
          </div>
        </div>
      </div>
      <br>
      <div class="card">
          <div class="card-header is-header-dark">
            <p class="card-header-title is-header-title-dark">
            <i class="fas fa-comment-alt fa-sm" aria-hidden="true"></i>
            &nbsp;Technical Discussions</p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fas fa-plus" aria-hidden="true"></i>
              </span>
            </a>
          </div>
          <div class="card-content">
            <div class="content">
              <div class="is-card-content-first">
                <span class="card-icon">
                  <i class="fas fa-comments fa-lg" aria-hidden="true"></i>
                </span>
              </div>
          </div>
        </div>
      </div>
      <br>
      <div class="card">
          <div class="card-header is-header-dark">
            <p class="card-header-title is-header-title-dark">
            <i class="fas fa-paint-brush fa-sm" aria-hidden="true"></i>
            &nbsp;Fanart/Artwork</p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fas fa-plus" aria-hidden="true"></i>
              </span>
            </a>
          </div>
          <div class="card-content">
            <div class="content">
              <div class="is-card-content-first">
                <span class="card-icon">
                  <i class="fas fa-comments fa-lg" aria-hidden="true"></i>
                </span>
              </div>
          </div>
        </div>
      </div>
      <br>
      <div class="card">
          <div class="card-header is-header-dark">
            <p class="card-header-title is-header-title-dark">Memes</p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fas fa-plus" aria-hidden="true"></i>
              </span>
            </a>
          </div>
          <div class="card-content">
            <div class="content">
              <div class="is-card-content-first">
                <span class="card-icon">
                  <i class="fas fa-comments fa-lg" aria-hidden="true"></i>
                </span>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- SIDEBAR -->
<aside class="column is-3 is-narrow-mobile is-fullheight section">
    <nav class="panel">
      <p class="panel-heading is-header-dark">
        Latest Topics
      </p>
      <div class="panel-block">
        <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
              </p>
            </div>
            <nav class="level is-mobile">
              <div class="level-left">
                <a class="level-item">
                  <span class="icon is-small"><i class="fas fa-reply"></i></span>
                </a>
                <a class="level-item">
                  <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                </a>
                <a class="level-item">
                  <span class="icon is-small"><i class="fas fa-heart"></i></span>
                </a>
              </div>
            </nav>
          </div>
          <div class="media-right">
            <button class="delete"></button>
          </div>
        </article>
      </div>
    </nav>
  </aside>
</section>
<footer class="footer"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
    <div class="content has-text-centered">
    <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>
</body>
</html>