<?php       
include('phpgate.php');

$user_delnum = (int)$_POST['delkey'];


if(isset($user_delnum)){
    $sqlDEL = "DELETE FROM team_performance WHERE inputorder = $user_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $user_delnum.'번이 삭제됐습니다.' ;
}

echo "삭제 시도 번호: ".$user_delnum."<br>";
echo "영향받은 행 수: ".mysqli_affected_rows($conn);
?>