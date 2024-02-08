<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <h3>글쓰기</h3>
    <form action="insert.php" method="post">
    <p>
        <label for="name">이름 :</label>
        <input type="text" id="name" name="name">
    </p>

    <p>
        <label for="message">메시지 :</label>
        <textarea  id="message" name="message" cols='30' rows='10'></textarea>
    </p>
      <input type="submit" value="글쓰기">

    </form>
</body>
</html>