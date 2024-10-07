<?php 
echo '대문자 Y는 연도'.date("Y"); //
echo "<br>";
echo '소문자 y는 2자리로 표시하는 연도'.date('y'); //
echo "<br>";
echo '대문자 M은 영어로 표시'.date('M');
echo "<br>";
echo '소문자 m은 숫자로 표시 0을 붙여서 '.date('m');
echo "<br>";
echo '소문자 n은 숫자로 표시 0을 안붙이고 '.date('n');
echo "<br>";
echo '대문자 D는 영어로 표시하는 요일이네 '.date('D');
echo "<br>";
echo '대문자 N는 숫자로 표시하는 요일이네 '.date('N'); //1부터 ~7까지 월화수목금토일
echo "<br>";
echo '소문자 d는 날짜네 '.date('d');
echo "<br>";
echo '소문자 j는 0을 빼고 표현하는 날짜네 '.date('j');
echo "<br>";
echo '한번에 다 붙여서 표현하기 '.date('Y-m-d H:i:s');


switch(date('N') ){
    case 1 : $yol = '월요일' ; break ;
    case 2 : $yol = '화요일' ; break ;
    case 3 : $yol = '수요일' ; break ;

}
echo "<br>";
echo '오늘은 : '.$yol." 입니다.";
?>