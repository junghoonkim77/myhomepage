<?php 
include('connect.php');
echo "<br>";
echo "저장중입니다.";
$year = date("Y");
$month = date("m");
$day = date("d");
$today = $year.$month.$day;

$teamname = $_POST['teamname'] ?? ''; 
$internet = $_POST['internet'] ?? ''; // 기본값 설정
$tv = $_POST['tv'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$success = $_POST['success'] ?? '';
$sr = $_POST['sr'] ?? '';

$sql ="INSERT INTO sales_today (teamname,internet,tv,mobile,success,sr) 
VALUES ('$teamname','$internet','$tv','$mobile','$success','$sr')";

$result = mysqli_query($conn,$sql);

if($result === false){
    echo '저장하지 못했습니다.';
    error_log(mysqli_error($conn)); // 에러 로그 기록
   }else{
    echo "
   <script>
     location.href ='todaytotal.php';
   </script>
   ";
   }
   
   mysqli_close($conn);
   print "<button><a href='index.html'>입력창 이동하기</a></button>";
   print "<button><a href='todaytotal.php'>당일 세일즈 목록 이동하기</a></button>";
?>

