<?php
$conn = mysqli_connect("localhost", "root", "", "warframe_forum");
$title = $_POST['title'];
$content = $_POST['content'];
$tag = $_POST['tag'];

$sql = "INSERT INTO posts (`title`, `content`, `tags`) values ('".$title."', '".$content."', '".$tag."')";

mysqli_query($conn,$sql);

mysqli_close($conn);

header("location: bugs.php");