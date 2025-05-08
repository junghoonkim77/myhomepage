<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE cs2collect (
  teamname VARCHAR(100) PRIMARY KEY,
  simplevoc INT,
  badvoc INT,
  badofbad INT,
  vocmemo VARCHAR(100)
);";

$result =  mysqli_query($conn,$sql);
?>