<?php 

//mysqli oop방식 연결

$servername = "localhost";
$username = "root";
$password = "amho73032721";

$conn = new mysqli($servername,$username,$password);
if($conn ->connect_error){
    echo "DB연결에 실패";
}else{
    echo "DB연결 성공";
}
?>