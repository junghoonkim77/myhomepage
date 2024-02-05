<ul>
    <?php 
    

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
     $view_num = $_GET['number'];
     $sql = "SELECT * FROM msg_board WHERE number = $view_num"; 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
     
    
    ?>
    </ul>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        li:hover {
            color : red;
        }
    </style>
    <title>view - abc게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>글 내용 </h2>

    <?php
if ($row = mysqli_fetch_array($result)) {
    ?>
    <h3>글번호 : <?= $row['number'] ?> / 글쓴이: <?= $row['name'] ?> </h3>
    <div>
        <?= $row['message'] ?>
    </div>
<?php } ?>
  
</body>
</html>