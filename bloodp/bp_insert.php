<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$nowtime = $_POST['nowtime'] ?? '';
$hipressure = $_POST['hipressure'] ?? ''; // 기본값 설정
$lowpressure = $_POST['lowpressure'] ?? '';
$memo = $_POST['memo'] ?? '';

$sql = "INSERT INTO blood_record  (todaycheck, hipressure, lowpressure, memo)
VALUES('$nowtime','$hipressure','$lowpressure','$memo')";
$result = mysqli_query($conn, $sql);

if($result === false){
    echo '저장실패';
    error_log(mysqli_error($conn));
}else{
    echo
    "
   <script>
     location.href ='bp_con.php';
   </script>
   ";
}
?>