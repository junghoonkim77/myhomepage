<?php 
//세션을 사용하는 모든 페이지에서 session_start()를 실행해야 된다.
session_start();

$_SESSION["username"]='김정훈';

echo '세션등록' ;
print_r($_SESSION["username"]);
?>