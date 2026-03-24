<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE IF NOT EXISTS c2sales_month
(teamname VARCHAR(10) PRIMARY KEY,
m_goal VARCHAR(10),
m_success VARCHAR(10),
it_goal VARCHAR(10),
it_success VARCHAR(10),
todaytime VARCHAR(30)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

$result =  mysqli_query($conn,$sql);
?>