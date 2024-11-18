<?php 
include('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS mymemosave (
    id INT AUTO_INCREMENT PRIMARY KEY,
    memocon LONGTEXT
)";

$result =  mysqli_query($conn,$sql);

?>


