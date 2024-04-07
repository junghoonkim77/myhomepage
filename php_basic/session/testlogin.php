<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="testhome.php" method="post">
        <input type="text" name="id" placeholder="아이디">
        <input type="text" name="password" placeholder="비번">
        <input type="submit"  value="체크">
    </form>
</body>
</html>