<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> 
     table {
        border : 1px solid gray;
        border-collapse : collapse;
        font-size : 12px;
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
    echo '<h2>'.'('.date("Y/m/d").')'."   ".'서울중앙통품 세일즈누적'.'</h2>';
    echo '<a href="세일즈실적관리.php">세일즈실적관리창 이동</a>';

    $cusnum = $_GET['cusnum'] ??'';
    $cusname = $_GET['cusname'] ??'';
    $comdate = $_GET['hopedate'] ??'';
    $teamname = $_GET['teamname'] ??'';
    $prodname = $_GET['prodname'] ??'';
    $sql = "INSERT INTO sales_success(cusnum,cusname,teamname,comdate,prodname)
    VALUES('$cusnum','$cusname','$teamname','$comdate','$prodname')" ;
    mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM sales_success";
    $result = mysqli_query($conn,$sql1);
   
    $td='';

    while($row=mysqli_fetch_array($result)){
    $td=$td.'<tr><td>'.$row['order_add'].'</td>'.'<td>'.$row['cusnum'].'</td>'.
    '<td>'.$row['cusname'].'</td>'.'<td>'.$row['teamname'].'</td>'.
    '<td>'.$row['comdate'].'</td>'.'<td>'.$row['prodname'].'</td>'.'</tr>';
    };

    ?>
    <table> 
     <td>순서</td><td>고객번호</td><td>고객명</td><td>팀원명</td><td>개통일자</td><td>상품</td>
     
        <?php echo $td ?>
     
    </table>
</body>
</html>