<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> 
     table {
        border : 1px solid gray;
        border-collapse : collapse;
     }
     td {
        border : 1px solid gray;
     }
    </style>
    <title>세일즈누적</title>
</head>
<body>
    <?php
    include('phpgate.php');

    $cusnum = $_GET['cusnum'] ??'';
    $cusname = $_GET['cusname'] ??'';
    $comdate = $_GET['hopedate'] ??'';
    $teamname = $_GET['teamname'] ??'';
    
    $sql = "INSERT INTO sales_success(cusnum,cusname,teamname,comdate)
    VALUES('$cusnum','$cusname','$teamname','$comdate')" ;
    mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM sales_success";
    $result = mysqli_query($conn,$sql1);
   
    $td='';

    while($row=mysqli_fetch_array($result)){
    $td=$td.'<tr><td>'.$row['order_add'].'</td>'.'<td>'.$row['cusnum'].'</td>'.
    '<td>'.$row['cusname'].'</td>'.'<td>'.$row['teamname'].'</td>'.
    '<td>'.$row['comdate'].'</td>'.'</tr>';
    };

    ?>
    <table> 
     <td>순서</td><td>고객번호</td><td>고객명</td><td>팀원명</td><td>개통일자</td>
     
        <?php echo $td ?>
     
    </table>
</body>
</html>