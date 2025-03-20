<?php 
include('phpgate.php');

$sql ="SELECT * FROM knowhow";
$result = mysqli_query($conn,$sql);
$addtable="";
while($row = mysqli_fetch_array($result)){
  
    $addtable = $addtable."<tr><td class='inputday' rowspan=\"3\">".$row['inputdate'].
    '</br>'.'['.$row['id'].']'.
    "</td><td class=\"ques\">질문</td><td class=\"ques\" colspan=\"2\">".nl2br($row['question']).
    "</td></tr><tr><td class='ans' rowspan=\"2\">답변"."</td>
     <td class='check'>✔</td><td class='answer'>".nl2br($row['answer'])."</td></tr>
    <tr><td><img src=\"../../imgfolder/cs2센터/tip.jpg\" style=\"width:2em;\" ></td>
    <td class='tip'>".nl2br($row['tip'])."</tr>";
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">


    <style>

        table {border : 1px solid gray; border-collapse: collapse;}

        td { border : 1px solid gray;}

        thead { border : 1px solid gray;}

        .anyq {
            text-align: center;
            background-color: black;
            color : yellow;
            font-family: "Pacifico", cursive;
            font-size: 1.5em;
        }
        .ques {
            font-size: 1.3em;
            font-weight: bold;
            text-align: center;
            background-color: lightgray;
            padding : 5px;
        }
        .check {
            color : red;
            font-weight : bold;
            text-align: center;
        }
        .inputday{
            font-size: 0.8em;
            text-align: center;
            background-color: lightgray;
            padding : 5px;
        }
        .ans{
            font-size: 1.3em;
            font-weight: bold;
            text-align: center;
            background-color: lightgray;
            padding : 5px;
        }
        .daytitle{
            font-size: 0.8em;
            background-color: lightgray;
            padding : 5px;
        }
        .answer{
            font-size: 1em;
            padding : 8px;
            color : red;
        }
        .tip{
            font-size: 1em;
            padding : 8px;
            font-weight: bold;
        }
    </style>

    

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">

</script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">

</script> 


    <title>따릉이</title>

</head>

<body>

    <table><thead>

        <tr>

          <thead>

          <td class="daytitle">일자</td><td class="anyq" colspan="3">무엇이든 물어보세요!&nbsp;&nbsp;따릉~따릉~</td>

         </thead>

        </tr>

    </thead>

      <tbody>

       <!-- <tr>  반복문 시작

          <td rowspan="3">날짜입력칸</td>

          <td>질문</td>

          <td colspan="2">뭐뭐는 뭐에요?</td>

        </tr>

        <tr>

          <td rowspan="2">답변</td>

          <td>✔</td>

          <td>뭐뭐는 뭐뭔 가능</td>

        </tr>

        <tr>

          <td><img src="../../IMGfolder/cs2센터/tip.jpg" style="width:2em;" ></td>

          <td>상담지식 질문번호</td>

        </tr> 반복문 끝 -->

       <?php echo $addtable; ?>
        

      </tbody>

      </table>

      <script>

        $('.daytitle').click(function(){

            location.href = 'input.php';

        });

      </script>

</body>

</html>