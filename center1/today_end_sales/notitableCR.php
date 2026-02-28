<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE IF NOT EXISTS cs1noti
(id INT AUTO_INCREMENT PRIMARY KEY,
teamname VARCHAR(100),
regiday VARCHAR(100),
noticon LONGTEXT
)";

$result =  mysqli_query($conn,$sql);
?>