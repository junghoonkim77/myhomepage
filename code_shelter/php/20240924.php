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
    echo "<h1>이메일 형식이 맞습니다.<h1>";
}else{
    echo "형식 다시 확인해주세요";
}



?>