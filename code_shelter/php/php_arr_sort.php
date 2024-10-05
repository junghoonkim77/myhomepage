<?php

$fruits = array('사과','배','귤','수박','토마토');

sort($fruits); //오름차순

print_r( $fruits ) ;


$age = array('김정훈'=>48,
'이창원'=>47,
'홍길동'=>35,
'초난강'=>40
);
echo "<br>";
print_r($age);
asort($age); // asort는 값에 따른 오름차순
echo "<br>";
print_r($age);
echo "<br>";
ksort($age); //키값을 기준으로 정렬 / 여기에 ar kr 을 하면 reverse되는걸로 보면 된다.
print_r($age);
?>