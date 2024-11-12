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

$conn1 = mysqli_connect($servername,$username,$password);
if(!$conn1){
    echo "db연결에 실패했습니다.";
}else{
    echo "db연결에 성공했습니다.";
}

?>