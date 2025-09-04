<?php 
include ('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS guidement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    casessort VARCHAR(50),
    cases VARCHAR(200),
    content LONGTEXT
       
)";

$result =  mysqli_query($conn,$sql);
?>