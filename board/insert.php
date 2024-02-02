<?php 
$conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

if(!$conn){
    echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
} else{
    echo '데이터 베이스에 접속했습니다.';
}

$user_name =$_POST['name'];
$user_msg = $_POST['message'];

$sql ="INSERT INTO msg_board (name,message) VALUES ('$user_name','$user_msg')";
// 데이터 베이스에 값을 넣는 코드
// 값이 잘 들어갔는지 조회를 해야 된다 
$result = mysqli_query($conn,$sql); 

if($result === false){
 echo '저장하지 못했습니다.';
 error_log(mysqli_error($conn)); // 에러 로그 기록
}else{
 echo '저장성공';
}

mysqli_close($conn);

print "<hr><a href='index.html'>메인화면으로 이동하기</a>";



?>