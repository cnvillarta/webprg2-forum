<?php
session_start();
$newUsername = $_POST['newUsername'];
$newEmail = $_POST['newEmail'];

$conn = mysqli_connect("localhost", "root", "", "forum");

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE `username` = ?";
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($statement, 's', $username);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$count = mysqli_num_rows($result);

if($count == 1){
    $sql = 'UPDATE `users` SET `username` = "'.$newUsername.'"';
    if(isset($newEmail)){
        $sql =. ', `email` = "'.$newEmail.'"';
    }
    mysqli_query($conn,$sql);
    header("location: profile.php?msg=success");
}else{
    header("location: profile.php?msg=asdasd");
}
