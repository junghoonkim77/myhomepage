<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname'] ?? '';
$simplevoc = $_POST['simplevoc'] ?? ''; // 기본값 설정
$badvoc = $_POST['badvoc'] ?? '';
$badofbad = $_POST['badofbad'] ?? '';
$vocmemo = $_POST['vocmemo'] ?? '';
$nowtime = $_POST['nowtime'] ??'';


$sql = "UPDATE cs2collect
SET simplevoc = '$simplevoc', badvoc = '$badvoc', badofbad = '$badofbad',vocmemo ='$vocmemo' , todaytime = '$nowtime'
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