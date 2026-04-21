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
} else {
    echo "에러: " . mysqli_error($conn);
}

echo "<a href='index.php'>돌아가기</a>";
?>