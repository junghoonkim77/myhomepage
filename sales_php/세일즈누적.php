<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> 
    .container{
        display : flex;

    }
     table {
        border : 1px solid gray;
        border-collapse : collapse;
        font-size : 12px;
     }
     td {
        border : 1px solid gray;
     }

     .delinput{
        width : 30px;
        
     }
    </style>
    <title>세일즈누적</title>
</head>
<body>
    
    <?php
    include('phpgate.php');
    echo '<h5>'.'('.date("Y/m/d").')'."   ".'서울중앙통품 세일즈누적'.'</h5>';
    echo '<a href="세일즈실적관리.php">세일즈실적관리창 이동</a>';
    
    
    $cusnum = $_GET['cusnum'] ??'';
    $cusname = $_GET['cusname'] ??'';
    $comdate = $_GET['hopedate'] ??'';
    $teamname = $_GET['teamname'] ??'';
    $prodname = $_GET['prodname'] ??'';

    if (!empty($cusnum)&&!empty($cusname)&&!empty($comdate)&&!empty($teamname)&&!empty($prodname)){
        $sql = "INSERT INTO sales_success(cusnum,cusname,teamname,comdate,prodname)
    VALUES('$cusnum','$cusname','$teamname','$comdate','$prodname')" ;
    mysqli_query($conn, $sql);
      }

    $sql1 = "SELECT * FROM sales_success";
    $result = mysqli_query($conn,$sql1);
   
    $td='';

    while($row=mysqli_fetch_array($result)){
    $td=$td.'<tr><td>'.$row['order_add'].'</td>'.'<td>'.$row['cusnum'].'</td>'.
    '<td>'.$row['cusname'].'</td>'.'<td>'.$row['teamname'].'</td>'.
    '<td>'.$row['comdate'].'</td>'.'<td>'.$row['prodname'].'</td>'.'</tr>';
    };
    
    

    ?>
    <div class="container">
    <table> 
     <td>순서</td><td>고객번호</td><td>고객명</td><td>팀원명</td><td>개통일자</td><td>상품</td>
     
        <?php echo $td ?>
     
    </table>
    <?php 
     $delkey = $_POST['delkey']??'';

     if(!empty($delkey)){
         $sqlDEL = "DELETE FROM sales_success WHERE order_add = $delkey"; 
         mysqli_query($conn,$sqlDEL);
         echo  $delkey.'번이 삭제됐습니다.' ;}
     
    ?>
   <div class="delinput">
    <form action="" method="post">
    <input type="text" name="delkey" placeholder="지울데이터 베이스 번호입력">
    <input type="submit" value="click">
   </form>
   </div>   
   
</div>  
</body>
</html>