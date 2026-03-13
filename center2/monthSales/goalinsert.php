<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname'] ?? '';
$Mtarget = $_POST['Mtarget'] ?? '';
$ITtarget = $_POST['ITtarget'] ?? '';


$sql = "UPDATE c2sales_month
SET m_goal = '$Mtarget',it_goal = '$ITtarget' WHERE teamname = '$teamname'" ;

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