<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style> 
    #inputdate,#question{
        display :block
    }
    textarea {
        margin-top: 20px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>따릉이입력</title>

</head>

<body>

    <form action="insert.php" method="post">

        <fieldset>

      <label for="inputdate">날짜입력</label>

      <input  id="inputdate" type="date" name="inputdate">

      <label for="question">질문</label>

      <input id="question" type="text" name="question">

      <label for="answer">답변</label>

      <textarea id="answer" cols="60" rows="20" name="answer"></textarea>

      <label for="tip">Tip~!</label>

      <textarea id="tip" cols="60" rows="20" name="tip"></textarea>

      <button type="submit">지식추가</button>

       </fieldset>
     
    </form>

</body>

</html>