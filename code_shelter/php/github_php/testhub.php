<?php 
include('connection.php');

$name1 = $_GET['name1']??"";
$hobby = $_GET['hobby']??"";

$sql ="INSERT INTO githubtest (name1,hobby) 
VALUES ('$name1','$hobby')";

$result = mysqli_query($conn,$sql);

$sql1 ="SELECT * FROM githubtest";
$result1 = mysqli_query($conn,$sql1);

$li ='';
while($row=mysqli_fetch_array($result1)){
$li=$li.'<li>'.$row['num'].'번'.'이름은 : '.$row['name1'].'취미는 :'.$row['hobby'].' 입니다.'.'</li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>받아와서 표현주는 사이트</title>
</head>
<body>
<ul>
 <?php 
 echo $li;
 ?>
</ul>    
</body>
</html>