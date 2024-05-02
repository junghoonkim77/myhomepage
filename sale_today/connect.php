<?php
$conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

 if(!$conn){
     echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
 } else{
     echo '데이터 베이스에 접속했습니다.';
 }