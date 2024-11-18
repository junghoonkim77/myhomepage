<?php
include('phpgate.php');

$textCon = $_POST['texAreamemo1']??"";


$sqlmemo ="INSERT INTO mymemosave (memocon) 
VALUES ('$textCon')";

$result = mysqli_query($conn,$sqlmemo);

if($result){
    echo "
    <script>
    self.location.href = '../html/mymemo copy.html'
    </script>
    ";
}else{
    echo "테이블 입력에 실패했습니다.";
}

?>