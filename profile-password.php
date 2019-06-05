<?php
session_start();
$currentpassword = $_POST['currentPass'];
$newpassword = $_POST['newPass'];
$newpasswordvalid = $_POST['newPassValid'];

$conn = mysqli_connect("localhost", "root", "", "forum");

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE `password` = ? AND `username` = ?";
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($statement, 'ss', $currentpassword, $username);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$count = mysqli_num_rows($result);

if($count == 1){
    if(strcasecmp($newpassword,$newpasswordvalid) == 0){
        $sql = 'UPDATE `users` SET `password` = "'.$newpasswordvalid.'" WHERE `username` = "'.$username.'"';
        mysqli_query($conn,$sql);
        header("location: profile.php?msg=success");
    }else{
        header("location: profile.php?msg=failed");
    }
}else{
    header("location: profile.php?msg=asdasd");
}
