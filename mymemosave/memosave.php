<?php
include('phpgate.php');

$textCon = $_POST['texAreamemo1']??"";


$sqlmemo ="INSERT INTO mymemosave (memocon) 
VALUES ('$textCon')";

$result = mysqli_query($conn,$sqlmemo);

if($result){
    echo "
    <script>
    self.location.href = '../html/mymemo.php'
    </script>
    ";
}else{
    echo "
    <script>
    alert('테이블 입력실패');
    </script>
    
    ";
}

?>