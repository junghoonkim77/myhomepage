<?php 
include('connect.php');

// 테이블을 초기화하는 SQL 명령을 실행합니다.
$query = "TRUNCATE TABLE sales_today";
$result = mysqli_query($conn,$query);

if($result) {
    echo "테이블이 초기화 됐습니다.</br>";
} else {
    echo "오류: " . mysqli_error($conn);
} 
$lasttime = $_GET['now'];
echo $lasttime;
$sql ="INSERT INTO timetable (lasttime) VALUES ('$lasttime')";

$result1 = mysqli_query($conn,$sql);
if($result1) {
    echo "마지막초기화 시간이 입력됐습니다~!.</br>";
    echo "
    <script>
      location.href ='todaytotal.php';
    </script>
    ";
} else {
    echo "오류: " . mysqli_error($conn);
}
?>
