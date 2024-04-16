<?php

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
     $view_num = $_GET['number'];
     $sql = "SELECT * FROM msg_board_hun WHERE number = $view_num"; 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정하기</title>
</head>
<body>
    <h1>수정하기</h1>
    <?php 
    if ($row = mysqli_fetch_array($result)){
    $Nam =   $row['name'];
    $Mes =   $row['message'];
    
     }
    ?>
    <form action="insert_update.php" method="post">
    <input type="hidden" name="number" value="<?=$view_num ?>">
    <p>
        <label for="name">제목 :</label>
        <input type="text" id="name" name="name" value=" <?=$Nam ?>">
    </p>

    <p>
        <label for="message">내용 :</label>
        <textarea  id="message" name="message" cols='60' rows='25'><?=$Mes ?></textarea>
    </p>
      <input type="submit" value="글쓰기">

    </form>
    <?php 
     mysqli_close($conn);
    
    ?>
    <a href="index.php">처음으로 돌아가기</a>
</body>
</html>