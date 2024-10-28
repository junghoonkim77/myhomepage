<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['ss_id']) or $_SESSION['ss_id']=""){
        echo "
        <script>
        alert('여기는 회원전용 페이지 입니다,로그인후 접속이 가능합니다.');
        self.location.href = 'index.php';
        </script>
        ";
        exit;
    }

    echo "<h1>".$_SESSION['ss_id']."님 멤버전용 페이지 입니다.</h1>"
    
    ?>
    <a href="logout.php">로그아웃</a>
</body>
</html>