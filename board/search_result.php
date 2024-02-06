<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abc-게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>검색 결과</h2>
    <ul>
    <?php 
    

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
    
     $user_skey =$_POST['skey']; // index에서 skey로 넘어온다 
     $sql = "SELECT * FROM msg_board WHERE message LIKE '%$user_skey%'"; 
     //LIKE를 쓰면 값을 포함하고 있는걸 가져오고 앞뒤로 %를 붙여주면 앞뒤 값을 상관하지 않는다. 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
     $list = '';
   

     while($row = mysqli_fetch_array($result)){ 
        $list = $list."<li>{$row['number']}번:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        
     }
     echo $list;

     mysqli_close($conn);
    ?>
    </ul>
    <hr><a href='index.php'>메인화면으로 이동하기</a>";

   
</body>
</html>