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
        .'<td>'.$row['success'].'</td>'.'<td>'.$row['sr'].'</td>';
    }
    echo $td;

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