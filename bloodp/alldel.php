<?php 
include('phpgate.php');

// 테이블 이름
$tableName = 'sales_board';

// SQL 쿼리
$query = "TRUNCATE TABLE $tableName ";

if (mysqli_query($conn, $query)) {
    echo '테이블이 성공적으로 비워졌습니다.';
} else {
    echo '테이블 비우기 실패: ' . mysqli_error($conn);
}

// 연결 종료
mysqli_close($conn);
?>
?>