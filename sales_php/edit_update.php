<?php
 include('phpgate.php');
$order = $_GET['ordernum'];
$comdate = $_GET['comdate'];
$prodname = $_GET['prodname'];

$sql ="UPDATE  sales_board SET hopedate = '$comdate' ,prodname ='$prodname' WHERE ordernum ='$order'";
// 데이터 베이스에 값을 넣는 코드
// 값이 잘 들어갔는지 조회를 해야 된다 
$result = mysqli_query($conn,$sql); 

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn)); // 에러 로그 기록
   }else{
    echo '수정성공';
   }
?>
<a href="sales_siljukcon.php">세일즈실적 관리창으로 이동</a>