<?php 
include ('phpgate.php');

// 기존 테이블에 newit_itsuccess 컬럼 추가
$sql = "ALTER TABLE c2sales_month 
ADD COLUMN newit_itsuccess VARCHAR(10);";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "컬럼이 성공적으로 추가되었습니다.";
} else {
    echo "컬럼 추가 실패: " . mysqli_error($conn);
}
?>