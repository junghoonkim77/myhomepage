<?php
//$_SESSION['name'] = '홍길동'
//unset($_SESSION['name']);
//$_SESSION['name'] = ''
session_start();
session_unset(); // 세션을 비우는것 
session_destroy(); // 

require_once('functions.php');
redirect('login.php');
die();
?>