<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .noanswer {
            color : red;
            font-weight: bold;
        }
    </style>
    <title>MJ 게시판</title>
</head>
<body>
    <h3>게시판</h3>
    <h4>검색 결과</h4>
    <ul>
    <?php 
    

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
    
     $user_skey =$_POST['skey']; // index에서 skey로 넘어온다 
     $sql = "SELECT * FROM msg_board_min WHERE message LIKE '%$user_skey%'"; 
     //LIKE를 쓰면 값을 포함하고 있는걸 가져오고 앞뒤로 %를 붙여주면 앞뒤 값을 상관하지 않는다. 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
     $list = '';
   
      if(mysqli_num_rows($result) == 0){
        echo "<li"." class="."noanswer".">결과값이 없습니다.</li>";
      }else{
        while($row = mysqli_fetch_array($result)){ 
            $list = $list."<li>{$row['number']}번:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
          };
      }

     
     echo $list;

     mysqli_close($conn);
    ?>
    </ul>
    <hr><a href='index.php'>메인화면으로 이동하기</a>";

   
</body>
</html>