<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
    <title>권유 멘트 추가</title>
</head>
<body>
    <h3>권유 멘트 추가</h3>
    <form id="guideAddok" action="guideAddok.php" method="post">
        <p>구분 : 
        <select id="casessort" name="casessort">
            <option value="">멘트 메뉴선택</option>
            <option value="vocments">문의별 멘트</option>
            <option value="cusments">보유상품별 멘트</option>
            <option value="banron">반론극복</option>
            <option value="tip">TIP(단선방지,호전환 메모활용)</option>
        </select>
        </p>
        <p>사례 : <textarea name="cases" rows="2" cols="20"></textarea></p>
        <p>내용 : <textarea name="content" rows="10" cols="100"></textarea></p>
        <p><input id="addbutton" type="submit" value="추가" /></p>
    </form>
    <script>
         $('#addbutton').click(function(e){
          if($('#casessort').val() !== ""){
            $('#guideAddok').submit();
          }else{
            alert('추가 원하는 메뉴를 선택하세요~!')
            e.preventDefault();
          }
        })
    </script>
</body>
</html>