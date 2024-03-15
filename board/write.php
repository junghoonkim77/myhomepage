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
        <label for="name">제목 :</label>
        <input type="text" id="name" name="name">
    </p>

    <p>
        <label for="message">내용 :</label>
        <textarea  id="message" name="message" cols='60' rows='25'></textarea>
    </p>
      <input type="submit" value="글쓰기">

    </form>
    <a href="index.php">처음으로 돌아가기</a>
</body>
</html>