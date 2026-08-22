<?php 
include('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS mymemosavenew (
    id INT AUTO_INCREMENT PRIMARY KEY,
    memocon LONGTEXT
)";

$result =  mysqli_query($conn,$sql);

?>


