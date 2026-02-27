<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname'] ?? '';
$it = $_POST['it'] ?? ''; // 기본값 설정
$mobile = $_POST['mobile'] ?? '';
$success = $_POST['success'] ?? '';
$successnew = $_POST['successnew'];
$success1 = $_POST['success1'] ?? '';
$nowtime = $_POST['nowtime'] ??'';

$sql = "UPDATE c1sales_end
SET it_tend = '$it', m_end = '$mobile', success_end ='$success' ,successnew ='$successnew',success_end1 ='$success1', todaytime = '$nowtime'
WHERE TeamName = '$teamname'" ;

$result = mysqli_query($conn,$sql);

if($result === false){
    echo '저장하지 못했습니다.';
    error_log(mysqli_error($conn)); // 에러 로그 기록
   }else{
    echo "
   <script>
     location.href ='index.php';
   </script>
   ";
   }
?>