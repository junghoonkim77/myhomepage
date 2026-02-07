<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE IF NOT EXISTS consultant 
( ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    teamname VARCHAR(100) NOT NULL
)";

$result =  mysqli_query($conn,$sql);
?>