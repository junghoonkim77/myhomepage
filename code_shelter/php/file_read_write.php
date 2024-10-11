<?php 
//읽기전용으로 갈것인지 쓰기전용으로 열것인지

$file = '2.txt';

if(file_exists($file)){
    $pf = fopen($file,'r'); // 읽기모드로 열었음
    $fz = filesize($file); // 파일사이즈 알아내기
    $fr = fread($pf,$fz);  //연 파일을 읽기
    
    echo $fr;
} else{
    echo "파일이 없슈";
}
 

?>