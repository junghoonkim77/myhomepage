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
   $id_arr =['guest','folkball','hoon'];
   $pw_arr =['1234','amho','2721'];
    if(in_array($id,$id_arr) and in_array($pw,$pw_arr)){
        session_start();
        $_SESSION['ss_id'] = $id;
        
       // self.location.href='member.php'; //회원전용 페이지로 이동
       // self.location.href='index.php'; //회원전용 페이지로 이동
        echo "
        <script>
        alert('로그인에 성공했습니다.');
        </script>
        ";
        header("Location:member.php");
        
    }else{
        echo "
        <script>
        alert('로그인에 실패했습니다. 아이디와 비번을 확인해주세요');
        </script>
        ";
        header("Location:index.php");
    }
    ?>
</body>
</html>