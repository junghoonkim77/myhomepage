<?php 
include ('phpgate.php');


$sql ="INSERT INTO cs2collect_title (num,coltitle) VALUES
(1,'[서울]SKT유심정보 유출관련 문의현황 (ver.16:30)')";
$result = mysqli_query($conn,$sql);

if($result === false){
    echo "저장실패";
    error_log(mysqli_error($conn));
}else{
    echo "저장성공";
}
?>