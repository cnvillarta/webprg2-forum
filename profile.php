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
      <?php
        if(isset($_SESSION['email'])){
          echo'
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">'. $_SESSION['username'] .'
          </a>
              
          </a>
            <div class="navbar-dropdown is-right">
              <a class="navbar-item" href="./profile.php">
              <span class="icon is-small"><i class="fas fa-user"></i></span>
            <span>&nbsp;Profile</span>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="./logout.php">
              <span class="icon is-small"><i class="fas fa-sign-out-alt"></i></span>
              <span>&nbsp;Sign Out</span>
              </a>
            </div>
          </div>
        </div>';
        }else{
        echo '<div class="buttons">
          <a class="button is-primary" href="signup.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="./login.php">
            Log in
          </a>
        </div>
      </div>';
        }
      ?>
    </div>
  </div>
</nav>

<?php
    $conn = mysqli_connect("localhost", "root", "", "forum");
    $sql = "SELECT * FROM users WHERE username = '". $_SESSION['username']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    ?>

<div class="container is-fullhd">
  <div class="card">
    <div class="card-content">
      <section class="hero is-primary has-bg">
        <div class="hero-body">
          <div class="columns">
            <div class="is-half is-offset-one-quarter">            
              <figure class="image is-128x128">
              <?php echo '<img class="is-rounded" src="data:profPic/png;base64,' . base64_encode($row['profPic']) . '"/>';?>
              </figure>
            </div>
          <div class="column">
            <strong class="is-white">#<?php echo $_SESSION["userID"]?></strong>
            <h1 class="is-gray">Username: <strong class="is-white"><?php echo $_SESSION["username"]?></strong></h1>
            <h1 class="is-gray">Rank: <strong class="is-white"><?php echo $_SESSION["rank"]?></strong></h1>
            <h1 class="is-gray">Status: <strong class="is-white"><?php echo $_SESSION["status"]?></strong></h1>
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
                <strong>Make the pain stop</strong>
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
                  <strong>Make the pain stop</strong>
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
                    <strong>Make the pain stop</strong>
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
                      <strong>Make the pain stop</strong>
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
                      <strong>Make the pain stop</strong>
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
        <p class="title is-3">Comments</p>
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
                      <a>user</a> replied to <a>another user's</a> topic on <strong>Make the pain stop</strong>
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
                    <i class="fa fa-comment-dots fa-stack-1x"></i>
                </span>
            </span>
            <div class="media-content">
              <div class="content">
                  <p class="is-size-8">
                      <a>user</a> replied to <a>another user's</a> topic on <strong>Make the pain stop</strong>
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
                    <i class="fa fa-comment-dots fa-stack-1x"></i>
                </span>
            </span>
            <div class="media-content">
              <div class="content">
                  <p class="is-size-8">
                      <a>user</a> replied to <a>another user's</a> topic on <strong>Make the pain stop</strong>
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
          <p class="title is-3">Upvotes</p>
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
                    <a>user</a> upvoted <strong>Make the pain stop</strong>
                  </p>
                </div>
              </div>
            </div>
            <div class="is-card-content-next">
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
                    <a>user</a> upvoted <strong>Make the pain stop</strong>
                  </p>
                </div>
              </div>
            </div>
            <div class="is-card-content-next">
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
                    <a>user</a> upvoted <strong>Make the pain stop</strong>
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
                      <input class="file-input" type="file" name="profPic">
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
                <form action="profile-info.php" method="post"  enctype="multipart/form-data">
                  <label class="label">Username</label>
                  <div class="control">
                    <input class="input" type="text" name="newUsername">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                    <input class="input" type="email" name="newEmail">
                  </div>
                </div>
                <div class="field is-grouped is-grouped-right">
                  <p class="control">
                    <input type="submit" class="button is-success" name="editUser" value="Save Changes">
                  </p>
                </div>
                </form>
                <br>
                <p class="title is-4">Change Password</p>
                <div class="field">
                <form action="profile-password.php" method="post">
              <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed'){
                  echo "<div class=\"notification is-danger\">
                  <button class=\"delete\"></button>
                  <strong>Authentication Failed!</strong> New password did not match!
                  </div>";
                }else if (isset($_GET["msg"]) && $_GET["msg"] == 'success'){
                  echo "<div class=\"notification is-success\">
                  <button class=\"delete\"></button>
                  <strong>Authentication Succeeded!</strong> Password has been changed!
                  </div>";
                }
              ?>
                  <label class="label">Current Password</label>
                  <div class="control">
                    <input class="input" type="password" name="currentPass">
                  </div>
                </div>
                <div class="field">
                  <label class="label">New Password</label>
                  <div class="control">
                    <input class="input" type="password" name="newPass">
                  </div>
                </div>
                <br>
                <div class="field">
                  <label class="label">Confirm New Password</label>
                  <div class="control">
                    <input class="input" type="password" name="newPassValid">
                  </div>
                </div>
                <br>
                <div class="field is-grouped is-grouped-right">
                  <p class="control">
                    <input type="submit" class="button is-success" name="editPass" value="Change Password">
                  </p>
                </div>
                </form>
              </div>
              <div class="column">
              </div>
            </div>
          </div>
          <!-- END EDIT -->
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