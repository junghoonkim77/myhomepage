<?php
include('phpgate.php');

$textCon = $_POST['texAreamemo1']??"";


$sqlmemo ="INSERT INTO mymemosave (memocon) 
VALUES (?)";

// Prepared Statement 생성
$stmt = mysqli_prepare($conn, $sqlmemo);

// Bind Parameter
mysqli_stmt_bind_param($stmt, "s", $textCon);


if(mysqli_stmt_execute($stmt)){
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

// Prepared Statement 종료
mysqli_stmt_close($stmt);

// DB 연결 종료
mysqli_close($conn);
?>
?>