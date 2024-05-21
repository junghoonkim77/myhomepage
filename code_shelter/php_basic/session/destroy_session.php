<?php 
session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION['username']); //세션을 해제하는 함수임
}

echo "세션접속해제";
?>