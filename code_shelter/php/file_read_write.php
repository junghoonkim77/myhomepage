<?php 
$listpath = 'list.txt';
$listO = fopen($listpath,'r');
$listSize = filesize($listpath);
$listR = fread($listO,$listSize);
echo $listR;
fclose($listO);

$addCon = '<li><a href="">이건 파일에 추가할내용</a></li>';
$listO_1 = fopen($listpath,'a'); 
fwrite($listO_1,$addCon);
fclose($listO_1);

?>
