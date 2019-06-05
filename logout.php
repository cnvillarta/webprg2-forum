<?php
session_start();
session_destroy();
if(isset($_COOKIE['usernamecookie']) && isset($_COOKIE['passwordcookie'])){
    setcookie("usernamecookie", "", time() - 3600, '/');
    setcookie("passwordcookie", "", time() - 3600, '/');
}
header("location: index.php");
?>