<?php 
include ('phpgate.php');

// 테이블 생성 SQL (괄호 위치와 쉼표 제거 확인)
$sql = "CREATE TABLE IF NOT EXISTS performance_records (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- 고유 번호
    nowCpdcount INT NOT NULL,                   -- 현시간 누적
    nowSalestry INT NOT NULL,                   -- 세일즈 시도건수
    nowSalesSuccess INT NOT NULL,               -- 세일즈 이관성공
    nowtime VARCHAR(50) NOT NULL                -- 마지막 컬럼은 쉼표 없음
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"; // 닫는 괄호 ')' 필수

$result = mysqli_query($conn, $sql);

// 실행 결과 확인을 위한 디버깅 코드 추가
if ($result) {
    echo "테이블 생성 성공 또는 이미 존재함";
} else {
    echo "테이블 생성 실패 이유: " . mysqli_error($conn);
}
?>