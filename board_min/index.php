<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>통화품질 게시판</title>
</head>
<body>
    <h3>게시판</h3>
    <h4>글 목록1</h4>
    <ul>
    <?php 
    

     include("mysqlpass.php");
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
     $sql = "SELECT * FROM msg_board_min"; //msg_board에 있는 내용을 모두 가져오는 코드
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
     $list = '';
     // echo 는 값을 그대로 출력 , print도 거의  똑같음
     // print_r 배열 , 객체 모양을 그대로 출력
     // var_dump 는 print_r보다 더 상세하게 출력 
     //print_r($result);
     //mysqli_fetch_array  배열로 뿌려주는 함수 
     // $row는 배열이 되며 index값으로 접근이 가능하다.
     //따옴표 앞에 역 슬레시를 해줘야 완벽한 문자 취급을 받는다.
     //배열안에 있는 갯수만큼만 이란 의미가 있다. ↓

    /* while($row = mysqli_fetch_array($result)){ 
        $list = $list."<li>{$row['number']}번:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        
     } 아래는 내가 수정한 코드 _대가리가 나쁜 사람이 쓰기 좋음    */
     while($row = mysqli_fetch_array($result)){ 
        $list = $list."<li>".$row['number']."번:<a href="."view.php?number=".$row['number'].">".$row['name']."</a></li>";
     }
     echo $list;
    ?>
    </ul>
    <hr>
        <p><a href="write.php">글쓰기</a></p>
    <hr>
    <h3>글 검색</h3>
    <form action="search_result.php" method="post">
        <h4>검색할 키워드를 입력하세요.</h4>
        <p>
            <label for="search">키워드 :</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h3>글 삭제</h3>
    <form action="delete.php" method="post">
        <h4>삭제할 메시지 번호를 선택하세요~!</h4>
        <p>
            <label for="msgdel">번호 :</label>
            <input type="text" id="msgdel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>
</body>
</html>