<?php 
include('phpgate.php');


$sql = "SELECT * FROM mymemosave";
$result = mysqli_query($conn,$sql);
$li ='';
while($row=mysqli_fetch_array($result)){
    $li=$li.'<li>'.$row['id'].'번 :'.$row['memocon']."<a href=./memoview.php?delmemo="
    .$row['id'].">".$row['id']."번 메모삭제</a>".'</li>';
};


$memo_delnum = $_GET['delmemo']??"";
echo $memo_delnum;

if(!empty($memo_delnum)){
    $sqlDEL = "DELETE FROM mymemosave WHERE id = $memo_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo $memo_delnum.'번이 삭제됐습니다.' ;
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
     ul >* {
        font-size : 10px;
     }
     ul li {
        white-space: pre-wrap;
        cursor : pointer;
        margin-bottom : 8px;
     }

     ul li:hover {
        background-color: yellowgreen;
     }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
    <script src="../java/library.js"></script>
    <title>서버메모저장</title>
</head>
<body>
    
    <ul>
        <?php echo $li; ?>
    </ul>
<script>
    $('ul li').on('click',function(){
      const $thislicon =  $(this).text();
        if(navigator.clipboard){
        $lib.clipcopy($thislicon);
      } else{
        $lib.clipcopy2($thislicon);
      }
    })
</script>
</body>
</html>