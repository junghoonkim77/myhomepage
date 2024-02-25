

<?php 
include('header.php');
include('phpgate.php');

$user_delnum =$_POST['delkey']; 

if(isset($user_delnum)){
    $sqlDEL = "DELETE FROM sales_board WHERE ordernum = $user_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $user_delnum.'번이 삭제됐습니다.' ;
}



echo '<a href='.'세일즈실적관리.php'.'>'.'메인으로 이동하기'.'</a>';
include('footer.php');
?>