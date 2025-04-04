<?php 
include('phpgate.php');

$delkey = $_POST['delkey']??'';

if(!empty($delkey)){
    $sqlDEL = "DELETE FROM sales_success WHERE order_add = $delkey"; 
    mysqli_query($conn,$sqlDEL);
    echo  $delkey.'번이 삭제됐습니다.' ;}
?>
<script type="text/javascript">
    alert("삭제되었습니다.");
    location.href = "sales_nujuk.php"; </script>