<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
//explode 함수 : 지정된 문자로 문자열을 잘라서 배열을 만들게 도와줌
$str ="a,b,c,d,e";
$arr = explode(',',$str);
print_r($arr);
echo count($arr);

echo end($arr);  //배열의 마지막 값을 리컨 , 구해주는 함수
echo "<br>";
$ext = 'aaa.exe';
$extarr = explode('.',$ext);
print_r($extarr);
?>

<script>
    let arr = [1,2,3,4,5];
    console.log(arr);
    let arr1 = arr.join(",");
    console.log(arr1);
    console.log(typeof(arr1));
</script>
</body>
</html>

