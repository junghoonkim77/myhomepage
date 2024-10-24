<?php
session_start();

if(isset($_SESSION['ss_name'])){
    echo "이름은 :".$_SESSION['ss_name']."입니다.";
}else {
    echo "이름을 모르겠습니다.".'<br>';
}

if(isset($_SESSION['ss_age'])){
    echo "나이는 :".$_SESSION['ss_age']."입니다.";
}else {
    echo "나이를 모르겠습니다.".'<br>';
}

print_r($_SESSION);
?>
<a href="3.php">세션삭제</a>