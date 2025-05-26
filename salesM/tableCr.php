<?php 
include('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS Msales_data (
    num INT AUTO_INCREMENT PRIMARY KEY,
    cunsulname VARCHAR(10) NOT NULL DEFAULT '',
    salesIn VARCHAR(30) NOT NULL DEFAULT '',
    cusname VARCHAR(40) NOT NULL DEFAULT '',
    salescomp VARCHAR(30) NOT NULL DEFAULT ''
    
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

// SQL 실행
if ($conn->query($sql) === TRUE) {
    echo "테이블 'Msales_data'가 성공적으로 생성되었습니다!";
} else {
    echo "테이블 생성 오류: " . $conn->error;
}

// 연결 종료
$conn->close();

?>