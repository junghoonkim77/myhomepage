<?php 
include ('phpgate.php');


$delnum = $_POST['delnum']??"";
$sqlDEL = "DELETE FROM guidement WHERE id = $delnum"; 
 mysqli_query($conn,$sqlDEL);

 echo '['.$delnum.']번이 삭제됐습니다.'.'<br>' ;
 echo "<a href='index.php'>멘트 가이드 이동</a><br>";
 echo "<a href='guideAdd.php'>멘트 입력창 이동</a>";


?>