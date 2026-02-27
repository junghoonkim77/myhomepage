

<?php 

include('phpgate.php');

$user_delnum =$_POST['id']; 

if(isset($user_delnum)){
    $sqlDEL = "DELETE FROM cs1noti WHERE id = $user_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $user_delnum.'번이 삭제됐습니다.' ;
}



echo '<a href='.'index.php'.'>'.'메인으로 이동하기'.'</a>';

?>