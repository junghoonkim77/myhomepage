<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE IF NOT EXISTS c2sales_end 
(teamname VARCHAR(100) PRIMARY KEY,
it_tend VARCHAR(10),
m_end VARCHAR(10),
tri_end VARCHAR(10),
success_end VARCHAR(10),
todaytime VARCHAR(30)

)";

$result =  mysqli_query($conn,$sql);
?>