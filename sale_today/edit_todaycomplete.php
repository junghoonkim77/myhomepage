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
    echo '수정성공';
}
?>

<a href="세일즈실적관리.php">세일즈실적 관리창으로 이동</a>