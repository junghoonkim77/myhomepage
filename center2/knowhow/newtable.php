<?php 
include ('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS knowhow (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inputdate VARCHAR(30),
    question LONGTEXT,
    answer LONGTEXT,
    tip LONGTEXT
   
)";

$result =  mysqli_query($conn,$sql);
?>