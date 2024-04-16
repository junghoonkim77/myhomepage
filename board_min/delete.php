<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MJ 게시판</title>
</head>
<body>
    <h3>게시판</h3>
    <h4>삭제 결과</h4>
    <ul>
    <?php 
    

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
    
     $user_delnum =$_POST['delnum']; // index에서 skey로 넘어온다 
     $sqlDEL = "DELETE FROM msg_board_min WHERE number = $user_delnum"; 
     mysqli_query($conn,$sqlDEL);

     $sql = "SELECT * FROM msg_board_min";
     $result = mysqli_query($conn,$sql);
     $list = '';
     

     while($row = mysqli_fetch_array($result)){ 
        $list = $list."<li>{$row['number']}번:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        
     }
     echo $list;

     mysqli_close($conn);
    ?>
    </ul>
    <?php 
    echo $user_delnum."번째 데이터가 삭제됐습니다~!"
    ?>
    <hr><a href='index.php'>메인화면으로 이동하기</a>";

   
</body>
</html>