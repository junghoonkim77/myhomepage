<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dir 디렉토리 경로알아내기</title>
</head>
<body>
    <?php 
    $dir_name = "./uploadfile";
    $d = dir($dir_name); // 인스턴스를 만들어 준다.
   /* $file_name = $d -> read();    
    echo $file_name.'<br>' ; 
    $file_name = $d -> read();
    echo $file_name."<br>";
    $file_name = $d -> read();
    echo $file_name."<br>"; */

    while(($file_name =$d -> read()) !== false){
        if($file_name == "." || $file_name ==".."){
          continue;  
        }
        echo $file_name."<br>";
    }
    
    $d -> close();  // 메모리를 반납하는 절차 
    ?>
</body>
</html>