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
    #question{
        width : 50em;
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

      <input class="valcheck" id="inputdate" autocomplete="off" type="date" name="inputdate">

      <label for="question">질문</label>

      <input class="valcheck" id="question" autocomplete="off" type="text" name="question">

      <label  for="answer">답변</label>

      <textarea class="valcheck" id="answer" autocomplete="off" cols="60" rows="20" name="answer"></textarea>

      <label for="tip">Tip~!</label>

      <textarea class="valcheck" id="tip" autocomplete="off" cols="60" rows="20" name="tip"></textarea>

      <button id="pass" type="submit">지식추가</button>

       </fieldset>
     
    </form>
    <form action="delete.php" method="get">
        <input autocomplete="off" type="number" name="delnum" id="">
        <button type="submit">삭제</button>

    <script> 
        $('#pass').click(function(){
            var inputdate = $('#inputdate').val();
            var question = $('#question').val();
            var answer = $('#answer').val();
            var tip = $('#tip').val();
            if(inputdate == ''){
                alert('날짜를 입력해주세요');
                return false;
            }
            if(question == ''){
                alert('질문을 입력해주세요');
                return false;
            }
            if(answer == ''){
                alert('답변을 입력해주세요');
                return false;
            }
            if(tip == ''){
                alert('Tip을 입력해주세요');
                return false;
            }
        });
    </script>

</body>

</html>