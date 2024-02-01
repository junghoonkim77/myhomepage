<?php 
$conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

if(!$conn){
    echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
} else{
    echo '데이터 베이스에 접속했습니다.';
}

$user_name =$_POST['name'];
$user_msg = $_POST['message'];

print $user_name;
print $user_msg;

mysqli_close($conn);

print "<hr><a href='index.html'>메인화면으로 이동하기</a>";



?>