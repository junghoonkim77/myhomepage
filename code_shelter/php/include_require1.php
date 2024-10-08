<!DOCTYPE html>
<html lang="kp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include('connect.php');
    include('button.html');
    include('include_require_get.php');
    echo '첫번째 이름은 :'.$name1.'두번째 이름은 :'.$name2.'세번째 이름은 :'.$name3.'네번째 이름은 :'.$name4.'입니다.';

    // include는 에러가 발생돼도 뒷부분이 실행되나 require는 fatal error를 발생 시킨다.
    // include_once는 한번만 실행 시키는 코드이다.
    
    ?>
<div>
    
</div>
</body>
</html>