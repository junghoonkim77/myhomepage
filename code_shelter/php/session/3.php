<?php 
session_start();
session_unset();

session_destroy();

?>
<a href="2.php">세션 확인하기</a>