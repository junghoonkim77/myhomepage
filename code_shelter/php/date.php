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



echo '날짜 증감해보기 '.date('Y-m').'-'.date('d');


echo "<tbody>";

for ($i = 1; $i <= 366; $i++) {
    $date = new DateTime("2024-01-01");
    $date->modify("+".($i - 1)." days");

    $mon = $date->format("n"); // 1~12 (월)
    $day = $date->format("j"); // 1~31 (일)

    $class = ($mon < 10) ? "0$mon tr" : "$mon tr";
    $month_display = ($mon < 10) ? "0$mon" : $mon;

    echo "<tr class='$class'><td>{$month_display}월/{$day}일</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>";
}

echo "</tbody>";

/*
modify()의 다양한 표현
modify("+1 day") → 하루 추가
modify("-1 day") → 하루 빼기
modify("+1 month") → 한 달 추가
modify("-1 year") → 1년 빼기
modify("next Monday") → 다음 월요일로 변경
modify("last Friday") → 지난 금요일로 변경
modify("first day of next month") → 다음 달의 첫째 날로 변경


포맷 문자	설명	예제 값 (2024-03-09 15:30:45)
Y	연도 (4자리)	2024
y	연도 (2자리)	24
m	월 (2자리)	03
n	월 (0 없이)	3
d	일 (2자리)	09
j	일 (0 없이)	9
H	시간 (24시간제, 2자리)	15
h	시간 (12시간제, 2자리)	03
i	분 (2자리)	30
s	초 (2자리)	45
A	오전/오후 (AM/PM)	PM
a	오전/오후 (소문자 am/pm)	pm
l	요일 (풀 네임)	Saturday
D	요일 (3글자)	Sat
*/




?>



