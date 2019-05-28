<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" class="has-bg-img">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="index.scss">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/burgermenu.js"></script>
    <script src="js/user-tab.js"></script>
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
<div class="container">
    <div class="card panel-is-transparent">
        <div class="card-content">
            <div class="columns">
                <div class="column is-one-quarter column-dark fixed-height">
                        <figure class="image is-180x180">
                            <img class="is-rounded" src="images/warframe icon.jpg">
                        </figure>
                        <section class="section is-prev">
                            <nav class="panel panel-next panel-is-light">
                                <p class="panel-heading is-header-dark">
                                    About (insert user)
                                </p>
                                <div class="panel-block top-adjust">
                                    <p class="panel-title">Member:</p>
                                    <p class="panel-desc1">PC</p>
                                </div>
                                <div class="panel-block top-adjust">
                                    <p class="panel-title">Rank:</p>
                                    <p class="panel-desc2">Eagle</p>
                                </div>
                                <div class="panel-block top-adjust">
                                    <p class="panel-title">Content:</p>
                                    <p class="panel-desc3">27</p>
                                </div>
                                <div class="panel-block top-adjust">
                                    <p class="panel-title">Status:</p>
                                    <p class="panel-desc4">Active</p>
                                </div>
                            </nav>
                        </section>
                        <section class="section is-next">
                            <nav class="panel panel-next panel-is-light">
                                <p class="panel-heading is-header-dark">
                                    Followers
                                </p>
                                <article class="media content-align">
                                    <figure class="media-left">
                                        <p class="image is-64x64">
                                        <img src="https://bulma.io/images/placeholders/128x128.png">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content content-align-center">
                                        <p>
                                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                                        </p>
                                        </div>
                                    </div>
                                </article>
                            </nav>
                        </section>
                    </div>
                <div class="column is-header-light">
                        <div class="tabs is-left">
                        <ul>
                            <li id="posts-tab" class="is-active">
                                <a onClick="switchToPosts()">
                                Posts
                                </a>
                            </li>
                            <li id="comments-tab">
                                <a onClick="switchToComments()">
                                Comments
                                </a>
                            </li>
                            <li id="votes-tab">
                                <a onClick="switchToVotes()">
                                Votes
                                </a>
                            </li>
                        </ul>
                        </div>
                    <div class="container is-fluid">
                        <div id="posts-tab-content">
                            <div class="is-card-content-first">
                                <span class="card-icon">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                        <i class="fa fa-comments fa-stack-1x"></i>
                                    </span>
                                </span>
                                <div class="media-content">
                                    <div class="content">
                                <p class="is-size-8">
                                    <strong>I fucking hate this</strong>
                                    <br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                                </p>
                                    <nav class="level is-mobile">
                                        <div class="level-left">
                                        <a class="level-item" aria-label="reply">
                                            <span class="icon is-small">
                                            <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        <a class="level-item" aria-label="retweet">
                                            <span class="icon is-small">
                                            <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        <a class="level-item" aria-label="like">
                                            <span class="icon is-small">
                                            <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        </div>
                                    </nav>
                                    </div>
                            </div>
                            </nav>
                        </div>
                            <div class="is-card-content-next">
                                <span class="card-icon">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                        <i class="fa fa-comments fa-stack-1x"></i>
                                    </span>
                                </span>
                                <p class="is-size-8">
                                    <strong>I fucking hate this</strong>
                                    <br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                                </p>
                            </div>
                            </div>
                            <div class="is-hidden" id="comments-tab-content">
                            <div class="is-card-content-first">
                                <span class="card-icon">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                        <i class="fa fa-comments fa-stack-1x"></i>
                                    </span>
                                </span>
                                <div class="media-content">
                                    <div class="content">
                                <p class="is-size-8">
                                    <a>user</a> replied to <a>another user's</a> topic on <strong>I fucking hate this</strong>
                                    <br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                                </p>
                                    <nav class="level is-mobile">
                                        <div class="level-left">
                                        <a class="level-item" aria-label="reply">
                                            <span class="icon is-small">
                                            <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        <a class="level-item" aria-label="retweet">
                                            <span class="icon is-small">
                                            <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        <a class="level-item" aria-label="like">
                                            <span class="icon is-small">
                                            <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                                            </span>
                                            &ensp;21
                                        </a>
                                        </div>
                                    </nav>
                                    </div>
                            </div>
                            </nav>
                        </div>
                            </div>
                            <div class="is-hidden" id="votes-tab-content">
                                <h1>hello im votes</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
    <div class="content has-text-centered">
      <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>
</body>
</html>