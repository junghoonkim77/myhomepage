<?php
include('phpgate.php');

$textCon = $_POST['texAreamemo1']??"";

$sqlmemo ="INSERT INTO mymemosave (memocon) 
VALUES ('$textCon')";

$result = mysqli_query($conn,$sqlmemo);

?>