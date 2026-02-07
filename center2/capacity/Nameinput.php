<?php
include('phpgate.php');

$pname     = $_POST['pname'];
$teamname = $_POST['teamname'];

// SQL 준비 및 실행 (SQL Injection 방지 위해 prepared statement 사용)
$stmt = $conn->prepare("INSERT INTO consultant (pname, teamname) VALUES (?, ?)");
$stmt->bind_param("ss", $pname, $teamname);

if ($stmt->execute()) {
    echo "새로운 레코드가 성공적으로 추가되었습니다!";
    echo "<script>
    location.href ='index.php'
     </script>";
} else {
    echo "에러: " . $stmt->error;
}

$stmt->close();
$conn->close();


?>