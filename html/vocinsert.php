<?php 
include ('phpgate.php');

$url = $_GET['urladd']??"";
$titlename = $_GET['titlename']??"";


 if(isset($url) && isset($titlename)){
    $sql = "INSERT INTO vocbank (url,title) VALUES('$url','$titlename')";
    $result = mysqli_query($conn,$sql);
    echo "<a href=\"gate.html\">홈피로이동</a> ";
 }else{
    echo "값을 입력하세요";
 }


if($result === false){
    echo '입력실패';
    error_log(mysqli_error($conn)); // 에러 로그 기록
   }else{
    echo "
   입력성공
   ";
   }
   
   mysqli_close($conn);

?>


