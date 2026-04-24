<?php
include 'phpgate.php'; // DB 연결 파일 포함

$now = $_POST['nowCpdcount'];
$try = $_POST['nowSalestry'];
$success = $_POST['nowSalesSuccess'];
$time = $_POST['nowtime'];
$classtime = $_POST['classtime'];

$sql = "INSERT INTO performance_records (nowCpdcount, nowSalestry, nowSalesSuccess, nowtime, classtime) 
        VALUES ('$now', '$try', '$success', '$time', '$classtime')";

if (mysqli_query($conn, $sql)) {
    echo "성공적으로 저장되었습니다.";
    echo "<script>location.href='record.php';</script>"; // 입력 후 기록 페이지로 이동
} else {
    echo "에러: " . mysqli_error($conn);
}
    
?>