<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_ok.php</title>
</head>
<body>
    <?php 
    $id = (isset($_POST['id']) and $_POST['id'] !="")? $_POST['id']:''; // $id=$_POST['id']??''; null병합 연산자
    $pw = (isset($_POST['pw']) and $_POST['pw'] !="")? $_POST['pw']:''; // $pw=$_POST['pw']??''; null병합 연산자

    if($id == ''){
        echo "
        <script>
            alert('아이디를 입력 바랍니다.);
            history.go(-1)
        </script>
        ";
        exit;
    }

    if($pw == ''){
        echo "
        <script>
            alert('비밀번호를 입력 바랍니다.);
            history.go(-1)
        </script>
        ";
        exit;
    }
    ?>
</body>
</html>