<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border : 1px solid gray;
        }
        td {
            border : 1px solid gray;
        }
    </style>
    <title>테이블연습</title>
</head>
<body>
    <table>
<?php
$conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

 if(!$conn){
     echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
 } else{
     echo '데이터 베이스에 접속했습니다.';
 }

 $sql = "SELECT * FROM msg_board";
 $result = mysqli_query($conn,$sql);
 $table = "";
 while($row = mysqli_fetch_array($result)){ 
    $table = $table."<tr>"."<td>".$row['number']."번"."</td>"."<td>"."이름:".$row['name']."</td>"."</tr>";
 }
 
 echo $table;

?>
</table>
</body>
</html>


