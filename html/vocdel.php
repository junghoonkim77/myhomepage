<?php 
include ('phpgate.php');


$delvoc = $_GET['delete']??"";

if(isset($delvoc)){
    $sqlDEL = "DELETE FROM vocbank WHERE num = $delvoc"; 
    mysqli_query($conn,$sqlDEL);
    echo $delvoc.'번이 삭제됐습니다.' ;
    echo "<a href=\"gate.html\">홈피로이동</a> ";
}

   
   mysqli_close($conn);

?>