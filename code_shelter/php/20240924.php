<?php

$test = "php";

echo "i love $test";

$test1=['1','2','3'];

var_dump($test1);

echo $test1[0];

$test2=["김정훈"=>'인격장애자','2','3'];
echo strlen($test2['김정훈']) ;
echo "<br>";
echo str_word_count('word');

$email = 'folkball@naver.com';

//strpos() 함수 장난 아닌데 

if(strpos($email,'@')){
    echo "<h1>이메일 형식이 맞습니다.</h1>";
}else{
    echo "형식 다시 확인해주세요";
}

$strrepl = "나는 자랑스러운 미국인이다.";

$strrepl1 = str_replace('미국인','한국인',$strrepl);
echo "<br>". $strrepl1;

$x = '안녕하세요~!' ;
var_dump(is_int($x));

// is_numeric => 숫자 여부를 판단하는 함수
if(is_numeric($x)){
echo "숫자가 맞습니다.";
}else{
  echo  "숫자가 아닙니다.";
}

//min , max 함수 ... 어떻게 보면 자바스크립트보다 더 편리하구나....
echo "<br>". min(12,3,44,55,54);

$rand = rand(1,6);
echo "<br>".$rand; //난수발생 아주 좋다.


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <h5 style="color : blue;"><?=$rand; ?></h5>
    <div id='parse'></div>
</body>
</html>
<script>
  const $parse = JSON.parse('<?php echo $rand ?>');
  document.getElementById('parse').innerHTML=$parse;
</script>