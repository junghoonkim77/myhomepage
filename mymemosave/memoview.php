<?php 
include('phpgate.php');


$sql = "SELECT * FROM mymemosave";
$result = mysqli_query($conn,$sql);
$li ='';
while($row=mysqli_fetch_array($result)){
    $li=$li.'<li>'.$row['id'].' :'.$row['memocon'].'</li>'."<a href=./memoview.php?delmemo="
    .$row['id'].">"."메모삭제</a>";
};


$memo_delnum = $_GET['delmemo']??"";
echo $memo_delnum;

/*
if(isset($memo_delnum)){
    $sqlDEL = "DELETE FROM mymemosave WHERE id = $memo_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $user_delnum.'번이 삭제됐습니다.' ;
}  */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
    <title>서버메모저장</title>
</head>
<body>
    
    <ul>
        <?php echo $li; ?>
    </ul>
</body>
</html>