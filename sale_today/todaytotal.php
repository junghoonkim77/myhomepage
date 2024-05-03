<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 


    <title>당일 시도건취합</title>
</head>
<body>
    <table >

    <?php 
    include('connect.php');
    
    $td ="";
    $sql = "SELECT * FROM sales_today";
    $result = mysqli_query($conn,$sql);
 
    while($row = mysqli_fetch_array($result)){
        $td = $td.'<tr><td>'.$row['num'].'</td>'.'<td>'.$row['teamname'].'</td>'
        .'<td>'.$row['internet'].'</td>'.'<td>'.$row['tv'].'</td>'.'<td>'.$row['mobile'].'</td>'
        .'<td>'.$row['success'].'</td>'.'<td>'.$row['sr'].'</td>'.'<td>'.'<form action='.'todaytotal.php'." ".'method='.'post'.'>'.
        '<input class="delsubmit" type=submit'." ".'name='.'delkey'." ".'value='.$row['num'].''.'>'.'</form>'.
        '</td>';
    }
    echo $td;

    $user_delnum =$_POST['delkey'] ?? ''; 

    if(!empty($user_delnum)){
        $sqlDEL = "DELETE FROM sales_today WHERE num = $user_delnum"; 
        mysqli_query($conn,$sqlDEL);
        echo $user_delnum.'번이 삭제됐습니다.' ;
    }
    ?>
    </table>
    <script src="../java/library.js"></script>
    <script> 
    $('table').click(function(){
        $lib.rangecopy('table');
    })
 
</script>
</body>
</html>