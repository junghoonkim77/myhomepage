<?php
include('connect.php');
$internet = $_POST['internet'];
$tv = $_POST['tv'];
$mobile = $_POST['mobile'];
$success = $_POST['success'];
$order = $_POST['ordernum'];
$sr = $_POST['sr'];
$sql ="UPDATE sales_today SET internet = '$internet', tv ='$tv', mobile ='$mobile', success='$success' , sr='$sr' WHERE num ='$order'";
// 데이터베이스에 값을 넣는 코드
// 값이 잘 들어갔는지 조회를 해야 된다 
$result = mysqli_query($conn, $sql);

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn)); // 에러 로그 기록
}else{
    echo '   '.$order.'번 :수정성공'.'<br><br><br>';
}
?>

<a href="index.html">일실적 입력창 이동</a>&nbsp;&nbsp;&nbsp; <a href="todaytotal.php">오늘 세일즈 목록창 이동</a>