<?php
session_start();
session_unset(); // 세션을 비우는것 
session_destroy();

require_once('functions.php');
redirect('login.php');
?>