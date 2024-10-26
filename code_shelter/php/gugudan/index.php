<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>폼 입력을 통한 구구단</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">  <!--$_SERVER['PHP_SELF'] 는 자기자신의 경로를 설정해준다. -->
        <label for="">출력하고자 하는 단을 입력합니다.</label>
        <input type="text" name="dan" id="">
        <button>구구단 출력</button>
    </form>
  <?php 
  
   ;
  if(isset($_GET['dan'])){
    for($num = 0 ; $num <= 9 ; $num++){
      echo $_GET['dan']*$num.'<br>';
    } 
  }else {
    echo "출력한 단수를 입력하시오";
  }
  ?>

  <a href="<?php echo $_SERVER['PHP_SELF']; ?>">구구단 입력값 초기화 하기</a>

</body>
</html>