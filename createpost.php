<?php
$conn = mysqli_connect("localhost", "root", "", "forum");
$title = $_POST['title'];
$content = $_POST['content'];
$tag = $_POST['tag'];

$target = "images/".basename($_FILES['image']['name']);

$image = $_FILES['image']['name'];

move_uploaded_file($_FILES["image"]["tmp_name"], $_FILES["image"]["name"]);
$bin_string = file_get_contents($_FILES["image"]["name"]);
$hex_string = base64_encode($bin_string);

$sql = "INSERT INTO posts (`title`, `content`, `tags`, `image`) values ('$title', '$content', '$tag', '".$hex_string."')";

mysqli_query($conn,$sql);

mysqli_close($conn);

header("location: index.php");