<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .showtable td{
           border : 1px solid gray;
           font-size: 11px;
        }
        .realtable{
            opacity : 0;
            font-size: 14px;
        }
        .realtable td{
            padding : 0px;
        }
        .head{
            display : inline-block;
            cursor : pointer;
            background-color: skyblue;
            box-shadow: 2px 2px 2px 0;
        }
        .board {
            position : relative;
        }
        .miniboard {
            position : absolute;
            bottom : 0px;
            left : 280px;
        }
        .back{
            margin-bottom:20px;
            }
        
    </style>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 


    <title>당일 시도건취합</title>
</head>
<body>
    
    <?php 
    include('connect.php');
   
    ?>
    
    
    

    <table class="showtable" >
    <thead><td>순서번호</td><td>팀원명</td><td>인터넷</td><td>TV</td><td>Mobile</td><td>권유성공</td>
    <td>SR번호</td>
    </thead>
    <?php 
     $user_delnum =$_POST['delkey'] ?? ''; 

     if(!empty($user_delnum)){
         $sqlDEL = "DELETE FROM difference WHERE num = $user_delnum"; 
         mysqli_query($conn,$sqlDEL);
         echo '<mark>'.$user_delnum.'번이 삭제됐습니다.'.'</mark>' ;
         
     }
     echo "<button class=\"back\"><a  href=\"index.html\">입력창 복귀</a></button>";
    $td ="";
    $sql = "SELECT * FROM difference";
    $result = mysqli_query($conn,$sql);

 
    while($row = mysqli_fetch_array($result)){
        $td = $td.'<tr class="'.$row['teamname'].' namesort"><td>'.$row['num'].'</td>'.'<td class="name">'.$row['teamname'].'</td>'
        .'<td>'.$row['sr'].'</td>'.'<td>'.$row['srhead'].'</td>'.'<td></td>'.'</tr>';
    }

   
    echo $td;
   
    ?>
    </table>
   
   
    <script src="../java/library.js"></script>
    <script> 
        
</script>
</body>
</html>