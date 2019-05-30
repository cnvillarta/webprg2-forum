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

<section class="main-content columns is-fullheight"  style="flex: 1;">
    <div class="container column is-8">
      <?php
      $total_pages_sql = "SELECT COUNT(id) FROM posts";
      $result = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_assoc($result);
      $total_pages = ceil($total_rows['COUNT(id)'] / $count);
      $offset = ($page - 1) * $count;
      $sql = "SELECT * FROM posts order by id desc LIMIT " . $offset . ", " . $count;
      $i = 0;
      if($result = mysqli_query($conn,$sql)){
        while($row = mysqli_fetch_assoc($result)){
          echo '<div class="modal" id="contentModal'.++$i.'">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">'.$row['title'].'</p>
                <button class="modal-close is-large" aria-label="close"></button>
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
                  <div class="content">'.$row['content'].'</div>
              </div>
              <footer class="card-footer">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a><i class="far fa-arrow-alt-circle-up" onclick="upvote()"></i></a>&nbsp;'
                .$row['votes'].
                '&nbsp;<a><i class="far fa-arrow-alt-circle-down" onclick="downvote()"></i></a>
              </footer>
          </div>';
        }
        if($page >= $total_pages){
          if(($page > $total_pages)){
            header("location: error.php");
          }else{
            echo '<nav class="pagination footer is-centered" role="navigation" aria-label="pagination" style="padding: 2rem 2rem 2rem">
              <a class="pagination-previous" href = "?page='.--$page.'">Previous</a>
              <ul class="pagination-list">
                <li class="pagination-link" disabled>'.++$page.'</li>
                <li class="pagination-link"><a class="page-link" href = "?page='.++$page.'">'.$page.'</a></li>
              </ul>
            </nav>';

          }
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
      ?>
    </div>
    <div class="container column is-3">
        <div class="card">
            <div class="card-header is-header-dark">
                    <p class="card-header-title is-header-title-dark">
                    &nbsp;Create New Post</p>
            </div>
            <div class="card-header is-header-dark">
                <p class="card-header-title is-header-title-dark">&nbsp;Filter Posts</p>
            </div>
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
    var span'.$i.' = document.getElementById("contentModal'.$i.'");
    
    // When the user clicks on the button, open the modal 
    btn'.$i.'.onclick = function() {
      modal'.$i.'.classList.add("is-active");
    }
    
    // When the user clicks on <span> (x), close the modal
    span'.$i.'.onclick = function() {
      modal'.$i.'.classList.remove("is-active");
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal'.$i.') {
        modal'.$i.'.classList.remove("is-active");
      }
    }
    ';
  }
}
?>
</script>
</body>
</html>