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
<form action="Teaminput.php" method="post">
   
    <select name="teamname" id="teamName">
        <option value="무1">무선1</option>
        <option value="무2">무선2</option>
        <option value="무3">무선3</option>
        <option value="무4">무선4</option>
        <option value="무5">무선5</option>
   
    </select>

    <select name="pname" id="consultantName">
        <option value=''>컨설턴트 선택</option>
    </select>

    
     <button type="submit">팀별 실적입력</button>
  </form>
  <br><br>   



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