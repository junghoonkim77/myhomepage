<?php
include('connect.php');
echo "<br>저장중입니다.<br>"; // HTML 출력 시 줄 바꿈을 위해 <br> 사용

$year = date("Y");
$month = date("m");
$day = date("d");
$today = $year.$month.$day;

$teamname = $_POST['teamname'] ?? '';
$internet = $_POST['internet'] ?? 0; // 숫자는 기본값을 0으로 설정
$tv = $_POST['tv'] ?? 0;
$mobile = $_POST['mobile'] ?? 0;
$success = $_POST['success'] ?? 0;
$sr = $_POST['sr'] ?? '';

// SQL 문 준비
$stmt = $conn->prepare("INSERT INTO sales_today (teamname, internet, tv, mobile, success, sr) VALUES (?, ?, ?, ?, ?, ?)");

// 매개변수 바인딩
// 'siiiis'는: string, int, int, int, int, string을 의미합니다. (실제 열 유형에 따라 조정)
// HTML 입력 유형에 따라 수정됨: s (teamname, sr은 문자열), i (internet, tv, mobile, success는 정수)
$stmt->bind_param("siiiis", $teamname, $internet, $tv, $mobile, $success, $sr);

// 문 실행
if ($stmt->execute()) {
    echo "
    <script>
      location.href ='todaytotal.php';
    </script>
    ";
} else {
    echo '저장하지 못했습니다: ' . $stmt->error; // 특정 오류 표시
    error_log("SQL Error: " . $stmt->error); // 서버 측 디버깅을 위해 오류 로그 기록
}

$stmt->close();
mysqli_close($conn);

print "<button><a href='index.html'>입력창 이동하기</a></button>";
print "<button><a href='todaytotal.php'>당일 세일즈 목록 이동하기</a></button>";
?>