<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $test = $_POST['test'];
    echo '<h3>'.$test.'</h3>';
    ?>
    <?php
     $checkbox = $_POST['checkbox']; 
     if(isset($checkbox)){
        echo '체크 상태입니다.';
     }else{
        echo '체크 상태가 아닙니다';
     }
    ?>
</body>
</html>