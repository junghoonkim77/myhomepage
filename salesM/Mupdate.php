<?php 
include('phpgate.php');
$salescomp = $_POST['salescomp']??'';
$addnumber = $_POST['addnumber']??'';

$sql ="UPDATE Msales_data SET salescomp = '$salescomp' WHERE num ='$addnumber'";
$result = mysqli_query($conn,$sql); 

if($result === false){
    echo '개통일자 추가 실패';
    error_log(mysqli_error($conn));
}else{
    echo
    "
   <script>
     location.href ='index.php';
   </script>
   ";
}
?>