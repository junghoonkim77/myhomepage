<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>세션공부하기</title>
</head>
<body>
<?php 
session_start();
$_SESSION['ss_name'] = '김정훈';
$_SESSION['ss_age'] = '48세';

?>
<a href="2.php">세션생성 확인</a>
</body>
</html>