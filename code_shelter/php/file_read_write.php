<?php 
//읽기전용으로 갈것인지 쓰기전용으로 열것인지

$file = '2.txt';

if(file_exists($file)){
    $pf = fopen($file,'r'); // 읽기모드로 열었음
    if($pf){
        $fz = filesize($file); // 파일사이즈 알아내기
        $fr = fread($pf,$fz);  //연 파일을 읽기
        if($fr){
            echo $fr;
            fclose($pf);
        }else {
            echo "파일 읽기에 실패했습니다.";
        }
    } else {
        echo "파일 열기에 실패했습니다.";
    }
    
   
} else{
    echo "파일이 없슈";
}
 
// -----------------------------------------------------  밑은 파일 쓰기

$file1 = 'fwrite.txt';

$pf1 = fopen($file1,'w');
fwrite($pf1,"안녕 정훈아~!");
fclose($pf1);
?>