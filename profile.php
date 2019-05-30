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
    <script src="js/upload-img.js"></script>
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
      <a class="navbar-item" href="https://www.warframe.com/game#keyart">Story</a>
      <a class="navbar-item" href="https://www.warframe.com/?category=pc">News (PC)</a>
      <a class="navbar-item" href="https://warframe.fandom.com/wiki/WARFRAME_Wiki">Wikia</a>
      <a class="navbar-item" href="https://www.warframe.com/prime-access">Prime Access</a>
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

<div class="container is-fullhd">
  <div class="card">
    <div class="card-content">
      <section class="hero is-primary has-bg">
        <div class="hero-body">
          <div class="columns">
            <div class="is-half is-offset-one-quarter">
              <figure class="image is-128x128">
                <img class="is-rounded" src="images/waframe icon.png">
              </figure>
            </div>
          <div class="column">
            <strong class="is-white">#1784</strong>
            <h1 class="is-gray">Username: <strong class="is-white">Zoroashi</strong></h1>
            <h1 class="is-gray">Rank: <strong class="is-white">Eagle</strong></h1>
            <h1 class="is-gray">Status: <strong class="is-white">Active</strong></h1>
          </div>
        </div>
      </div>
      <div class="hero-foot">
        <div class="container">
          <div class="tabs is-right is-tab-dark">
            <ul>
                <li id="posts-tab" class="is-active">
                  <a onClick="switchToPosts()"><span class="icon is-small"><i class="fas fa-comments" aria-hidden="true"></i></span>Posts</a>
                </li>
                <li id="comments-tab">
                  <a onClick="switchToComments()"><span class="icon is-small"><i class="fas fa-comment-dots" aria-hidden="true"></i></span>Comments</a>
                </li>
                <li id="votes-tab">
                  <a onClick="switchToVotes()"><span class="icon is-small"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>Votes</a>
                </li>
                <li id="edit-tab">
                <a onClick="switchToEdit()"><span class="icon is-small"><i class="fas fa-cog" aria-hidden="true"></i></span>Edit Profile</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div id="posts-tab-content">
      <p class="title is-4">Posts</p>
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, 
                lacinia lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
              </p>
            <nav class="level is-mobile">
              <div class="level-left">
                <a class="level-item" aria-label="reply">
                  <span class="icon is-small">
                  <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                  </span>&ensp;21
                </a>
                <a class="level-item" aria-label="retweet">
                  <span class="icon is-small">
                  <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                  </span>&ensp;21
                </a>
                <a class="level-item" aria-label="like">
                  <span class="icon is-small">
                  <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                  </span>&ensp;21
                </a>
              </div>
            </nav>
            </div>
        </div>
      </div>
        <div class="is-card-content-next">
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
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend,
                   lacinia lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
              </p>
            <nav class="level is-mobile">
              <div class="level-left">
                <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                    <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                    </span>&ensp;21
                </a>
                <a class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                    <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                    </span>&ensp;21
                </a>
                <a class="level-item" aria-label="like">
                    <span class="icon is-small">
                    <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                    </span>&ensp;21
                </a>
              </div>
            </nav>
            </div>
          </div>
        </div>
          <div class="is-card-content-next">
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia 
                    lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                </p>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                    <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                    </span>&ensp;21
                  </a>
                  <a class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                    <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                    </span>&ensp;21
                  </a>
                  <a class="level-item" aria-label="like">
                    <span class="icon is-small">
                    <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                    </span>&ensp;21
                  </a>
                </div>
              </nav>
              </div>
          </div>
        </div>
          <div class="is-card-content-next">
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
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia 
                      lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                  </p>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                      <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                    <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                    <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                  </div>
                </nav>
                </div>
            </div>
          </div>
            <div class="is-card-content-next">
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
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia 
                      lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                  </p>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                      <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                    <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                    <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                      </span>&ensp;21
                    </a>
                  </div>
                </nav>
                </div>
            </div>
          </div>
        </div>
        <!-- END POSTS -->

        <!--START COMMENTS-->
        <div class="is-hidden" id="comments-tab-content">
        <p class="title is-4">Comments</p>
          <div class="is-card-content-first">
            <span class="card-icon">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x icon-background"></i>
                    <i class="fa fa-comment-dots fa-stack-1x"></i>
                </span>
            </span>
            <div class="media-content">
              <div class="content">
                  <p class="is-size-8">
                      <a>user</a> replied to <a>another user's</a> topic on <strong>I fucking hate this</strong>
                      <br>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id tincidunt erat. Phasellus ut sem eleifend, lacinia 
                      lectus non, molestie felis. Aliquam ultricies urna eget lacinia cursus. mwa
                  </p>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                      <i class="fas fa-comment-dots" id="reply" aria-hidden="true"></i>
                      </span>&ensp;21
                  </a>
                  <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                      </span>&ensp;21
                  </a>
                  <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                      <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                      </span>&ensp;21
                  </a>
                </div>
              </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- END COMMENTS -->

          <!-- START VOTES -->
          <div class="is-hidden" id="votes-tab-content">
          <p class="title is-4">Upvotes</p>
            <div class="is-card-content-first">
              <span class="card-icon">
                  <span class="fa-stack fa-2x">
                      <i class="fa fa-circle fa-stack-2x icon-background"></i>
                      <i class="fa fa-thumbs-up fa-stack-1x"></i>
                  </span>
              </span>
              <div class="media-content">
                <div class="content">
                  <p class="is-size-8">
                    <br>
                    <a>user</a> upvoted <strong>I fucking hate this</strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- END VOTES -->

          <!-- START EDIT -->
          <div class="is-hidden" id="edit-tab-content">
          <p class="title is-3">Edit Profile</p>
            <div class="columns">
              <div class="column is-one-fifth"></div>
              <div class="column">
                <figure class="image is-150x150 img-upload-align">
                  <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                  <br>
                  <div class="file is-small img-upload-align">
                    <label class="file-label">
                      <input class="file-input" type="file" name="resume">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                    </label>
                  </div>
                </figure>
              </div>
              <div class="column is-half">
                <p class="title is-4">User Info</p>
                <div class="field">
                  <label class="label">Username</label>
                  <div class="control">
                    <input class="input" type="text" name="username">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                    <input class="input" type="text" name="email">
                  </div>
                </div>
                <br>
                <p class="title is-4">Change Password</p>
                <div class="field">
                  <label class="label">Current Password</label>
                  <div class="control">
                    <input class="input" type="text" name="currentpass">
                  </div>
                </div>
                <div class="field">
                  <label class="label">New Password</label>
                  <div class="control">
                    <input class="input" type="text" name="newpass">
                  </div>
                </div>
                <br>
                <div class="field is-grouped is-grouped-right">
                  <p class="control">
                    <a class="button is-primary">
                      Save Changes
                    </a>
                  </p>
                </div>
              </div>
              <div class="column">
              </div>
            </div>
          </div>
          <!-- END EDIT -->
    </section>
    </div>
  </div>
</div>
<footer class="footer footer-color footer-padding">
    <div class="content has-text-centered">
      <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>
</body>
</html>