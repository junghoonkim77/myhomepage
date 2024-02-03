<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abc-게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>글 목록</h2>
    <?php 
     $conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

     if(!$conn){
         echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
     } else{
         echo '데이터 베이스에 접속했습니다.';
     }
     // msg_board 테이블에 글조회 데이터를 조회하는건 SELECT이다 
     $sql = "SELECT * FROM msg_board"; //msg_board에 있는 내용을 모두 가져오는 코드
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
     
     while($row = mysqli_fetch_array($result)){ 
        $list = $list."<li>{$row['number']}:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
     }


    ?>
    <hr>
        <p><a href="write.php">글쓰기</a></p>
    <hr>
    <h2>글 검색</h2>
    <form action="search.php" method="post">
        <h3>검색할 키워드를 입력하세요.</h3>
        <p>
            <label for="search">키워드 :</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h2>글 삭제</h2>
    <form action="delete.php" method="post">
        <h3>삭제할 메시지 번호를 선택하세요~!</h3>
        <p>
            <label for="msgdel">번호 :</label>
            <input type="text" id="msgdel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>
</body>
</html>