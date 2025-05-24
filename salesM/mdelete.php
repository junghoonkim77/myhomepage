<?php 
include('phpgate.php');

$delnum = $_POST['delnum'];

if(isset($delnum)){
    $sqlDEL = "DELETE FROM Msales_data WHERE num = $delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $delnum.'번이 삭제됐습니다.'.'<br>' ;
}

?>
<a href="index.php">모바일실적페이지 이동</a>