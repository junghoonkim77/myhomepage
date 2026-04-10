<?php 
include ('phpgate.php');

$sql = "CREATE TABLE IF NOT EXISTS voc_table (
    vocno VARCHAR(255) NULL, 
    vocseper VARCHAR(255) NULL,                            -- 기존 엑셀 순서 (숫자)
    voc1cha VARCHAR(255) NULL,               -- 짧은 텍스트 1
    voc2cha VARCHAR(255) NULL,               -- 짧은 텍스트 2
    voc3cha VARCHAR(255) NULL,               -- 짧은 텍스트 3
    voc4cha VARCHAR(255) NULL,               -- 짧은 텍스트 4
    con_meaning TEXT NULL,                   -- 롱 텍스트 및 기호
    common TEXT NULL,                        -- 롱 텍스트 및 기호
    wire TEXT NULL,                          -- 롱 텍스트 및 기호
    wireless TEXT NULL                       -- 롱 텍스트 및 기호
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

// 3. 쿼리 실행 및 결과 확인
if ($conn->query($sql) === TRUE) {
    echo "테이블 'voc_table'이 성공적으로 생성되었습니다.";
} else {
    echo "테이블 생성 중 오류 발생: " . $conn->error;
}

$conn->close();
?>
