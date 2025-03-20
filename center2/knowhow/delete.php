<?php 
include ('phpgate.php');


$delnum = $_GET['delnum']??"";
$sqlDEL = "DELETE FROM knowhow WHERE id = $delnum"; 
 mysqli_query($conn,$sqlDEL);

 echo '['.$delnum.']번이 삭제됐습니다.'.'<br>' ;
 echo "<a href='index.php'>따릉이화면으로 이동하기</a><br>";
 echo "<a href='input.php'>입력화면으로 이동하기</a>";


?>