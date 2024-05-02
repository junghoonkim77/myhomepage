<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    button {
        display : block;
    }
    </style>
    <title>입력성공확인창</title>
</head>
<body>
    <?php 
    $name = $_GET['name'];
    $srname = $_GET['sr'];

    echo'<h3>'. $name.' 님'.' SR:'.$srname.' 입력완료'.'</h3>';
    print "<button><a href='input.html'>입력창 이동하기</a></button>";
    print "<button><a href='todaytotal.php'>당일 세일즈 목록 이동하기</a></button>";
    ?>
</body>
</html>