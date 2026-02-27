<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname1'] ?? '';
$boanresult = $_POST['boancheck'] ?? ''; // 기본값 설정
$inputday = $_POST['nowtime1'] ?? '';

$sql = "UPDATE dailyboan2
SET teamname = '$teamname', boanresult = '$boanresult', inputday = '$inputday'
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