<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE cs2collect 
(teamname VARCHAR(100) PRIMARY KEY,
simplevoc VARCHAR(10),
badvoc VARCHAR(10),
tri_end VARCHAR(10),
success_end VARCHAR(10),
todaytime VARCHAR(30)

)";

$result =  mysqli_query($conn,$sql);
?>