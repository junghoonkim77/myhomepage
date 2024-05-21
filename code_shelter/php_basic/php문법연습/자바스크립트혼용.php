<?php 
session_start();
if(isset($_SESSION["name"])){
  echo $_SESSION["name"]."있다"."<br>";
}else{
    echo "없슈"."<br>";
}
$test = $_GET['test'] ?? '';
if(empty($test)){
 echo "입력값이 없습니다."."<br>";
} ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자바스크립트혼용</title>
</head>
<body>
    <div>
       <?= $test ?>
    </div>
    <a href ="자바스크립트혼용.php?test=김정훈" >클릭해보기</a>
    <script>
        var jatest = JSON.parse('<?= json_encode($test); ?>')
        console.log (jatest );
    </script>
</body>
</html>