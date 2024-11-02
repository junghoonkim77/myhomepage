<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>입력값 필터</title>
</head>
<body>
    <form action="filter1.php" method="get">
    <input type="email" name="tel" placeholder="이메일 주소 형식 확인">
    <button>이메일 주소 형식 확인</button>
    </form>
    <?php 
    // 정수필터 : FILTER_VALIDATE_INT
    // 실수필터 :FILTER_VALIDATE_FLOAT (정수 필터링)
    // IP필터 : FILTER_VALIDATE_IP 
    // 이메일 필터 : FILTER_VALIDATE_EMAIL
    // URL 필터 : FILTER_VALIDATE_URL
    
   /* $i=100;
    $j = filter_var($i,FILTER_VALIDATE_INT); 
    
    if($j){
        echo $i."제대로 된 정수입니다.";
    } else{
        echo $i."는 정수가 아닙니다.";
    } */
    $tel = $_GET['tel']??"";
    if(filter_var($tel,FILTER_VALIDATE_EMAIL)){
        echo "이메일 주소가 맞습니다." ;
    }else {
        echo "이메일 주소 형식 재확인 필요";
    }

     $int = 100 ;
     $min = 1 ;
     $max = 200 ;

     if(filter_var($int,FILTER_VALIDATE_INT,array("options" => array("min_rang" => $min , "max_rang" => $max))) === false){
        echo "범위를 벗어납니다.";   // 옵션으로 범위를 넣는다.
     }else {
        echo "범위안에 들어와 있습니다.";
     }

    ?>
</body>
</html>