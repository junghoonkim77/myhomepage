<?php
 

$conn = mysqli_connect('localhost','folkball','amho73032721!','folkball');

if(!$conn){
    echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
} else{
    echo '<h2>'.'('.date("Y/m/d").')'."   ".'서울중앙센터 세일즈현황'.'</h2>';
}
?>