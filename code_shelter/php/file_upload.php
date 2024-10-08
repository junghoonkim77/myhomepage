<?php 

print_r($_FILES);
echo "<br>";
echo $_FILES['ufile']['name'];
echo $_FILES['ufile']['size'];

$tfile ='./uploadfile/test.jpg';
move_uploaded_file($_FILES['ufile']['tmp_name'],$tfile);
?>