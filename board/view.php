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
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>통화품질 게시판</title>
</head>
<body>
    <h3>게시판</h3>
    <h4>글 내용 </h4>

<?php

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
     $view_num = $_GET['number'];
     $sql = "SELECT * FROM msg_board WHERE number = $view_num"; 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
     

if ($row = mysqli_fetch_array($result)) {
    echo '<h3>글번호 : ' . $row['number'] . ' / 제목: ' . $row['name'] . '</h3>';
    echo '<div><pre>' . $row['message'] . '</pre></div>';
}

?>

<hr>
  <a href="index.php">처음으로 돌아가기</a>
  <script src="../java/library.js"></script>
  <script>
  jQuery(function(){
    $(document).on("click", "div", function(){
         const preval = $('pre').text();
          $lib.clipcopy(preval);
    })
    
    }) //맨 끝줄
  </script>
</body>
</html>