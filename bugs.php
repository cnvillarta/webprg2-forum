<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "warframe_forum");
    $count = 10;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <link rel="stylesheet" href="index.scss">
    <script src="js/burgermenu.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="shortcut icon" href="images/warframe_logo_1__GaU_icon.ico" />
    <title>WARFRAME</title>
</head>
<body class="has-navbar-fixed-top" style="display: flex; min-height: 100vh; flex-direction: column;">
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
          <div class="modal" id="loginModal">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">Login</p>
                <button class="modal-close is-large" id="closeLogin" aria-label="close"></button>
              </header>
              <section class="modal-card-body">
                <div class="field">
                  <label class="label">Username</label>
                  <input class="input" type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="field">
                  <label class="label">Password</label>
                  <input class="input" type="password" placeholder="Enter your password" name="password">
                </div>
                <label class="checkbox">
                <input type="checkbox">
                    Remember Me
                </label>
                <a href="#" class="forgot-password">Forgot password?</a>
              </section>
              <footer class="modal-card-foot" style="padding: 1rem 2rem;">
                <nav class="navbar is-light">
                  <div class="navbar-start">
                    <div class="navbar-item">
                      <a class="button is-info">Log In</a>
                    </div>
                  </div>
                  <div class="navbar-end">
                    <div class="navbar-item">
                      Not a member? <a href="signup.php"><u>Click here to sign up.</u></a>
                    </div>
                  </div>
                </nav>
              </footer>
            </div>
          </div>
          <a class="button is-light" id="login">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<section class="hero is-dark is-medium has-bg-img">
  <div class="hero-body">
    <div class="container" style="max-width:100%;">
    </div>
  </div>
</section>

<section class="main-content columns is-fullheight"  style="flex: 1;">
    <div class="container column is-9">
      <?php
      if(isset($_GET['filter'])){
        $total_pages_sql = "SELECT COUNT(id) FROM posts WHERE tags = '".$_GET['filter']."'";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_assoc($result);
        $total_pages = ceil($total_rows['COUNT(id)'] / $count);
        $offset = ($page - 1) * $count;
        $sql = "SELECT * FROM posts WHERE tags = '".$_GET['filter']."' order by id desc LIMIT " . $offset . ", " . $count;
        $i = 0;
        if($result = mysqli_query($conn,$sql)){
          while($row = mysqli_fetch_assoc($result)){
            echo '<div class="modal" id="contentModal'.++$i.'">
              <div class="modal-background"></div>
              <div class="modal-card">
                <header class="modal-card-head">
                  <p class="modal-card-title">'.$row['title'].'</p>
                  <button class="modal-close is-large" id="closeModal'.$i.'" "aria-label="close"></button>
                </header>
                <section class="modal-card-body">'.$row['content'].'</section>
                <footer class="modal-card-body">
                    <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                    .$row['votes'].
                    '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
                </footer>
                <section class="modal-card-foot">Hey fuck you!</section>
              </div>
            </div>';
            echo '<div class="card" style="padding: 2rem 2rem 2rem 2rem;">
                <header class="card-header">
                    <a id="openModal'.$i.'"><p class="card-header-title">'.$row['title'].'</p></a>
                </header>
                <div class="card-content">
                    <div class="content" style="height:  3em; overflow: hidden;">'.$row['content'].'</div>
                </div>
                <footer class="card-footer">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                  .$row['votes'].
                  '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
                </footer>
            </div>';
          }
          if($page > $total_pages){
            header("location: error.php");
          }else if($page == $total_pages){
              echo '<nav class="pagination footer is-centered" role="navigation" aria-label="pagination" style="padding: 2rem 2rem 2rem">
                <a class="pagination-previous" href = "?filter='.$_GET['filter'].'&page='.$page.'">Previous</a>
                <ul class="pagination-list">
                <li class="pagination-link"><a class="page-link" href = "?filter='.$_GET['filter'].'&page='.$page.'">'.$page.'</a></li>
                  <li class="pagination-link" disabled>'.++$page.'</li>
                </ul>
              </nav>';
          }else if($page > 1) {
            echo '<nav class="pagination is-centered" role="navigation" aria-label="pagination">
                    <a class="pagination-previous" href="?filter='.$_GET['filter'].'&page='.--$page.'">Previous</a>
                    <ul class="pagination-list">
                      <li class="pagination-link"><a class="page-link" href = "?filter='.$_GET['filter'].'&page='.$page.'">'.$page.'</a></li>
                      <li class="pagination-link" disabled>'.++$page.'</li>
                      <li class="pagination-link"><a class="page-link" href = "?filter='.$_GET['filter'].'&page='.++$page.'">'.$page.'</a></li>
                    </ul>
                    <a class="pagination-next" href="?filter='.$_GET['filter'].'&page='.$page.'">Next page</a>
                  </nav>';
          }else if( $page == 1 ) {
            echo '<nav class="pagination" role="navigation" aria-label="pagination">
                    <ul class="pagination-list">
                      <li class="pagination-link" disabled>'.$page.'</li>
                      <li class="pagination-link"><a class="page-link" href = "?filter='.$_GET['filter'].'&page='.++$page.'">'.$page.'</a></li>
                      <a class="pagination-next">Next page</a>
                    </ul>
                  </nav>';
          }
        }else{
          echo '<div>No results found</div>';
        }
      }else{
        $total_pages_sql = "SELECT COUNT(id) FROM posts";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_assoc($result);
        $total_pages = ceil($total_rows['COUNT(id)'] / $count);
        $offset = ($page - 1) * $count;
        $sql = "SELECT * FROM posts order by id desc LIMIT " . $offset . ", " . $count;
        $i = 0;
        if($result = mysqli_query($conn,$sql)){
          while($row = mysqli_fetch_array($result)){
            if($row['image']){
              $output_hex_string = $row['image'];
              $output_bin_string = base64_decode($output_hex_string);

              echo '<div class="modal" id="contentModal'.++$i.'">
                <div class="modal-background"></div>
                <div class="modal-card">
                  <header class="modal-card-head">
                    <p class="modal-card-title">'.$row['title'].'</p>
                    <button class="modal-close is-large" id="closeModal'.$i.'" "aria-label="close"></button>
                  </header>
                  <section class="modal-card-body">
                    <div class="content is-pulled-left">
                      <figure class="image is-128x128">
                        <img src="data:image/png;base64,'.base64_encode($output_bin_string).'">
                      </figure>
                    </div>
                    <p>'.$row['content'].'</p>
                  </section>
                  <footer class="modal-card-body">
                      <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                      .$row['votes'].
                      '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
                  </footer>
                  <section class="modal-card-foot">Hey fuck you!</section>
                </div>
              </div>';
            }else{
              echo '<div class="modal" id="contentModal'.++$i.'">
                <div class="modal-background"></div>
                <div class="modal-card">
                  <header class="modal-card-head">
                    <p class="modal-card-title">'.$row['title'].'</p>
                    <button class="modal-close is-large" id="closeModal'.$i.'" "aria-label="close"></button>
                  </header>
                  <section class="modal-card-body">
                    '.$row['content'].'
                  </section>
                  <footer class="modal-card-body">
                      <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                      .$row['votes'].
                      '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
                  </footer>
                  <section class="modal-card-foot">Hey fuck you!</section>
                </div>
              </div>';
            }
            echo '<div class="card" style="padding: 2rem 2rem 2rem 2rem;">
                <header class="card-header">
                    <a id="openModal'.$i.'"><p class="card-header-title">'.$row['title'].'</p></a>
                </header>
                <div class="card-content">
                    <div class="content" style="height:  3em; overflow: hidden;">'.$row['content'].'</div>
                </div>
                <footer class="card-footer">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                  .$row['votes'].
                  '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
                </footer>
            </div>';
          }
          if($page > $total_pages){
            header("location: error.php");
          }else if($page == $total_pages){
              echo '<nav class="pagination footer is-centered" role="navigation" aria-label="pagination" style="padding: 2rem 2rem 2rem">
                <a class="pagination-previous" href = "?page='.$page.'">Previous</a>
                <ul class="pagination-list">
                <li class="pagination-link"><a class="page-link" href = "?page='.$page.'">'.$page.'</a></li>
                <li class="pagination-link" disabled>'.++$page.'</li>
                </ul>
              </nav>';
          }else if($page > 1) {
            echo '<nav class="pagination is-centered" role="navigation" aria-label="pagination">
                    <a class="pagination-previous" href="?page='.--$page.'">Previous</a>
                    <ul class="pagination-list">
                      <li class="pagination-link"><a class="page-link" href = "?page='.$page.'">'.$page.'</a></li>
                      <li class="pagination-link" disabled>'.++$page.'</li>
                      <li class="pagination-link"><a class="page-link" href = "?page='.++$page.'">'.$page.'</a></li>
                    </ul>
                    <a class="pagination-next" href="?page='.$page.'">Next page</a>
                  </nav>';
          }else if( $page == 1 ) {
            echo '<nav class="pagination" role="navigation" aria-label="pagination">
                    <ul class="pagination-list">
                      <li class="pagination-link" disabled>'.$page.'</li>
                      <li class="pagination-link"><a class="page-link" href = "?page='.++$page.'">'.$page.'</a></li>
                      <a class="pagination-next">Next page</a>
                    </ul>
                  </nav>';
          }
        }
      }
      ?>
    </div>
    <nav class="panel container column is-2">
      <a><p class="panel-heading" id="createpost">Create a post</p></a>
      <p class="panel-heading">Filter Posts</p>
      <a class="panel-block" href="?filter=bugs">Bugs</a>
      <a class="panel-block" href="?filter=technical">Technical Discussions</a>
      <a class="panel-block" href="?filter=art">Artworks</a>
      <a class="panel-block" href="?filter=memes">Memes</a>
      <a class="panel-block" href="?filter=announcements">Official Announcements</a>
    </nav>
    <div class="modal" id="newpost">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Create New Post</p>
          <button class="modal-close is-large" id="close"></button>
        </header>
        <section class="modal-card-body">
          <form action="createpost.php" method="post" enctype="multipart/form-data">
            <div class="field">
              <div class="control">
                <label class="label">Title</label>
                <input class="input" type="text" placeholder="An interesting title" name="title">
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input type="file" name="image">
              </div>
            </div>
            <div class="field">
              <div class="control">
                <label class="label">Content</label>
                <textarea class="textarea" type="text" name="content" rows="10"></textarea>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <label class="label">Tag</label>
                <div class="select">
                  <select name="tag">
                    <option value="bugs">Bugs</option>
                    <option value="technical">Techincal Discussions</option>
                    <option value="art">Artworks</option>
                    <option value="memes">Memes</option>
                    <option value="announcements">Official Announcements</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <button class="button is-link">Submit</button>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
</section>

<footer class="footer"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
    <div class="content has-text-centered">
      <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
    </div>
</footer>

<script>
<?php
$sql = "SELECT * FROM posts order by id desc LIMIT " . $offset . ", " . $count;
$i = 0;
if($result = mysqli_query($conn,$sql)){
  while($row = mysqli_fetch_assoc($result)){
    echo '
    // Get the modal
    var modal'.++$i.' = document.getElementById("contentModal'.$i.'");
        
    // Get the button that opens the modal
    var btn'.$i.' = document.getElementById("openModal'.$i.'");
    
    // Get the <span> element that closes the modal
    var close'.$i.' = document.getElementById("closeModal'.$i.'");
    
    // When the user clicks on the button, open the modal 
    btn'.$i.'.onclick = function() {
      modal'.$i.'.classList.toggle("is-active");
    }
    
    // When the user clicks on <span> (x), close the modal
    close'.$i.'.onclick = function() {
      modal'.$i.'.classList.toggle("is-active");
    }
    ';
  }
}
mysqli_close($conn);
?>
var login = document.getElementById("login");

var loginModal = document.getElementById("loginModal");

var closeLogin = document.getElementById("closeLogin");

login.onclick=function(){
  loginModal.classList.toggle("is-active");
}

closeLogin.onclick = function(){
  loginModal.classList.toggle("is-active");
}

var create = document.getElementById("newpost");

var opencreate = document.getElementById("createpost");

var close = document.getElementById("close");

opencreate.onclick=function(){
  create.classList.toggle("is-active");
}
close.onclick = function(){
  create.classList.toggle("is-active");
}

var file = document.getElementById("file");
file.onchange = function(){
    if(file.files.length > 0)
    {

      document.getElementById('filename').innerHTML = 					file.files[0].name;

    }
};

</script>
</body>
</html>