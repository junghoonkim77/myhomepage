<?php 
include("mysqlpass.php");

$number =$_POST['number'];
$user_name =$_POST['name'];
$user_msg = $_POST['message'];

$sql ="UPDATE  msg_board_hun SET name = '$user_name' ,message ='$user_msg' WHERE number ='$number'";
// 데이터 베이스에 값을 넣는 코드
// 값이 잘 들어갔는지 조회를 해야 된다 
$result = mysqli_query($conn,$sql); 

if($result === false){
 echo '수정하지 못했습니다.';
 error_log(mysqli_error($conn)); // 에러 로그 기록
}else{
 echo '수정성공';
}

mysqli_close($conn);

print "<hr><a href='index.php'>메인화면으로 이동하기</a>";



?>