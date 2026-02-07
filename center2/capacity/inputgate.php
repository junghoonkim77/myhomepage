<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>실적입력창</title>
</head>
<body>
    <form action="Nameinput.php" method="post">
   
    <select name="teamname" id="teamname">
        <option value="무1">무선1</option>
        <option value="무2">무선2</option>
        <option value="무3">무선3</option>
        <option value="무4">무선4</option>
        <option value="무5">무선5</option>
        <option value="통품">통품</option>
    </select>
     이름: <input type="text" name="pname" id="name"><br>
     <button type="submit">컨설턴트 추가</button>
  </form>
    
</body>
</html>