<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>실적입력창</title>
</head>
<body>

<h2>개인 실적 입력</h2> <a href="index.php">일별 효율 관리부 이동</a>
    <form action="siljukinsert.php" method="POST">
        <fieldset>
            <legend>기본 정보</legend>
            날짜: <input type="date" name="inputday" required><br>
            <select name="nowteam" id="teamName">
                <option value="무1">무선1</option>
                <option value="무2">무선2</option>
                <option value="무3">무선3</option>
                <option value="무4">무선4</option>
                <option value="무5">무선5</option>
          </select>

    <select name="cunsulname" id="consultantName">
        <option value=''>컨설턴트 선택</option>
    </select>
        </fieldset>
        
        <fieldset>
            <legend>콜 실적</legend>
            콜 건수: <input type="number" name="cpd" value="0"><br>
            ATT: <input type="text" name="att" placeholder="00:00:00"><br>
            ACW: <input type="text" name="acw" placeholder="00:00:00"><br>
            총 통화시간: <input type="text" name="calltime" placeholder="00:00:00">
        </fieldset>

        <fieldset>
            <legend>인터넷/모바일 실적</legend>
            인터넷 시도: <input type="number" name="trycount" value="0"> 
            성공: <input type="number" name="trysuccess" value="0"> 
            가설: <input type="number" name="trygood" value="0"><br>
            모바일 시도: <input type="number" name="mtrycount" value="0"> 
            성공: <input type="number" name="mtrysuccess" value="0"> 
            가설: <input type="number" name="mtrygood" value="0">
        </fieldset>

        <p>자가 분석:<br>
        <textarea name="analysys" rows="5" cols="50"></textarea></p>
        
        <button type="submit">실적 저장하기</button>
    </form>

<br><br>   


// 컨설턴트 추가 폼
<form action="Nameinput.php" method="post">
   
    <select name="teamname" id="teamname_add">
        <option value="무1">무선1</option>
        <option value="무2">무선2</option>
        <option value="무3">무선3</option>
        <option value="무4">무선4</option>
        <option value="무5">무선5</option>
    </select>
     이름: <input type="text" name="pname" id="name"><br>
     <button type="submit">컨설턴트 추가</button>
  </form>

  <form action="siljukdel.php" method="post">
    <input type="number" name="delkey" placeholder="삭제할 번호 입력">
    <button type="submit">실적 삭제</button>
  </form>

    <script>
         $('#teamName').change(function(){
        let team = $(this).val();
        $.ajax({
        url: "getConsultant.php",
        type: "POST",
        data: { team: team },
        success: function(response){
            $('#consultantName').html(response);
        }
    });

});
    </script>
</body>
</html>