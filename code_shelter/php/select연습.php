<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
    <select name="select" id="select">
        <option value="">선택</option>
        <option value="김정훈">김정훈</option>
        <option value="김주남">김주남</option>
        <option value="김기준">김기준</option>
        <option value="김기은">김기은</option>
    </select>
    <input type="text" name="input" >
    <input type="submit" value="제출">
    </form>
   <div>
    <?php 
    $t1 = $_GET['select'] ?? '';
    $t2 = $_GET['input'] ?? '';
    if(!empty($t1) and !empty($t2)  ){
        echo '이름은 : '.$t1.'이고 '.'성격은 : '.$t2.'입니다.';
    } else{
        echo "값을 입력해주세요";
    }
     
    

    ?>

   </div>
    
</body>
</html>