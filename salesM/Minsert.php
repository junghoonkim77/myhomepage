<?php 
include('phpgate.php');

$cunsulname = $_POST['cunsulname'];
$salesIn = $_POST['salesIn']??'';
$cusname = $_POST['cusname']??'';
;

$sql = "INSERT INTO Msales_data  (cunsulname, salesIn , cusname)
VALUES('$cunsulname','$salesIn','$cusname')";
$result = mysqli_query($conn, $sql);

if($result === false){
    echo '저장실패';
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