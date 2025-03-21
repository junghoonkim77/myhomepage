<?php 
include('phpgate.php');

$editnum = $_GET['editnum']??'';

$sql = "SELECT * FROM knowhow WHERE id = $editnum";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
    $inputdate = $row['inputdate'];
    $question = $row['question'];
    $answer = $row['answer'];
    $tip = $row['tip'];
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <title>따릉이 수정</title>
</head>
<body>
    <h2>따릉이 수정창</h2>
    <form action="edit_end.php" method="post">

    <fieldset>

  <label for="inputdate">날짜입력</label>

  <input class="valcheck" id="inputdate" value="<?php echo $inputdate ?>" autocomplete="off" type="date" name="inputdate">

  <label for="question">질문</label>

  <input class="valcheck" id="question" value="<?php echo $question ?>" autocomplete="off" type="text" name="question">
  <input class="valcheck"  value="<?php echo $editnum ?>" autocomplete="off" type="hidden" name="id">
  <label  for="answer">답변</label>

  <textarea class="valcheck" id="answer"  autocomplete="off" cols="60" rows="20" name="answer"><?php echo $answer ?></textarea>

  <label for="tip">Tip~!</label>

  <textarea class="valcheck" id="tip"  autocomplete="off" cols="60" rows="20" name="tip"><?php echo $tip ?></textarea>

  <button id="pass" type="submit">지식수정</button>

   </fieldset>
 
</form>
<a href="index.php">지식관리창으로 이동</a>
<a href="input.php">입력창으로 이동</a>
</body>
</html>