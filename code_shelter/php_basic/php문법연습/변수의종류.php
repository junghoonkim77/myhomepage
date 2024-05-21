<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $number = "1";
    echo $number;
    var_dump($number);

    $testarray =array('kim'=>'인생쓰레기','jjoo'=>'완전착하고이쁨','jjunn'=>'착하고순수하고똑똑','eun'=>'착하고순수하고똑똑2');
    echo $testarray['kim'].'<br>';
    $testarray2 = ['kim'=>'인생쓰레기','jjoo'=>'완전착하고이쁨','jjunn'=>'착하고순수하고똑똑','eun'=>'착하고순수하고똑똑2'];
   echo $testarray2['jjoo'].'<br>';
   echo count($testarray2);
   $today = date("Y/m/d");
   echo $today;
   ?>
   <h4>오늘의 날짜는? <?php echo $today; ?></h4>
</body>
</html>