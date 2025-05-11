<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$coltitle = $_POST['coltitle'] ??'';

$sql = "UPDATE cs2collect_title
SET coltitle = '$coltitle' WHERE num = 1 
";
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