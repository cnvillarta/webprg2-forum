<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="has-signup-bg">
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
                    <a class="navbar-item" href="https://www.warframe.com/game#keyart">Story</a>
                    <a class="navbar-item" href="https://www.warframe.com/?category=pc">News (PC)</a>
                    <a class="navbar-item" href="https://warframe.fandom.com/wiki/WARFRAME_Wiki"> Wikia</a>
                    <a class="navbar-item" href="https://www.warframe.com/prime-access">Prime Access</a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Forums</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item"> <!-- href="index.php/forum/updates"-->Updates</a>
                            <a class="navbar-item"> <!-- href="index.php/forum/community"-->Community</a>
                            <a class="navbar-item"> <!-- href="index.php/forum/reports"-->Reports</a>
                            <a class="navbar-item"> <!-- href="index.php/forum/feedback"-->Feedback</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="signup.php"><strong>Sign up</strong></a>
                            <a class="button is-light" href="signin.php">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <section class="is-centered-left" style="padding-top: 2rem;">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-7"></div>
                    <div class="column is-5 adjust">
                        <div class="box">
                            <div class="box-content">
                                <div class="content">
                                    <h3>Sign Up</h3>
                                    <div class="field">
                                        <label class="label">Username</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="text" placeholder="(e.g: JohnSmith1348)" name="username">
                                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                                            <span class="icon is-small is-right"><i class="fas fa-asterisk"></i></span>
                                        </div>
                                        <label class="label">Email Address</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="example@outlook.com" name="email">
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                            <span class="icon is-small is-right"><i class="fas fa-asterisk"></i></span>
                                        </div>
                                        <label class="label">Password</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input" type="password" placeholder="************" name="password">
                                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                                <span class="icon is-small is-right"><i class="fas fa-asterisk"></i></span>
                                            </div>
                                        <label class="label">Confirm Password</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input" type="password" placeholder="************" name="confirmpassword">
                                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                                <span class="icon is-small is-right"><i class="fas fa-asterisk"></i></span>
                                            </div>
                                        <div class="field">
                                            <div class="control">
                                                <label class="checkbox">
                                                    <input type="checkbox">
                                                    I am over 13 and agree to the <a href="#">Terms of User</a> and 
                                                    <a href="#">Privacy Policy.</a>
                                                </label>
                                                <label class="checkbox cb-next">
                                                    <input type="checkbox" checked="checked">
                                                    I want to subscribe to your newsletter.
                                                </label>
                                            </div>
                                            <a class="button is-info">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <footer class="footer"  style="background-color: #696969; padding: 2rem 2rem 2rem 2rem; margin-top: 0.27rem;">
            <div class="content has-text-centered">
            <p><strong>WARFRAME</strong> Forum by Maurice Figueras and Chlouie Villarta.</p>
            </div>
        </footer>
    </body>
</html>