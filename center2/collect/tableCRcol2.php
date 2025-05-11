<?php 
include ('phpgate.php');

// 테이블 생성 SQL
$sql = "CREATE TABLE IF NOT EXISTS cs2collect_title (
  num INT PRIMARY KEY,
  coltitle VARCHAR(200)
);";

$result =  mysqli_query($conn,$sql);
if($result){
  echo "테이블 생성성공" ;
}else{
  echo "생성실패";
}
?>