<?php 
include('connect.php');

// 테이블을 초기화하는 SQL 명령을 실행합니다.
$query = "TRUNCATE TABLE sales_today";
$result = mysqli_query($conn,$query);

if($result) {
    echo "테이블이 초기화 됐습니다.";
} else {
    echo "오류: " . mysqli_error($conn);
}
?>
