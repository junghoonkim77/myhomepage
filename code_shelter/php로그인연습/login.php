<?php 
$id = $_POST['id'] ??'';
$password = $_POST['password'] ??'';
const id = 'folkball';
const password = "amho7303";

if( !($id==id and $password==password)){
 header('location:login.php');
 die();
}else{
    echo "맞아유";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 창</title>
</head>
<body>
 <h1>어렵지만 재미있는 php</h1>
   <?php 
    echo "아이디는 : ".$id."<br>";
    echo "비밀번호는 : ".$password."<br>";
    ?>
</body>
</html>