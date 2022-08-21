<?php
$conn = mysqli_connect('localhost','root','amho73032721');
mysqli_select_db($conn,'opentutorials');
$sql ="INSERT INTO topic(title,description,author,created) 
 VALUES('".$_POST['title']."','".$_POST['description']."','".$_POST['author']."',now())";
$result = mysqli_query($conn,$sql);

header('location: http://localhost/php/index.php');
?>
