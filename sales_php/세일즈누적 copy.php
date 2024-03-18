<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

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
     .total {
        border : 1px solid gray;
        width : 60px;
        background-color : skyblue;
        font-size : 12px;
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
    $td=$td.'<tr class="tr"><td>'.$row['order_add'].'</td>'.'<td>'.$row['cusnum'].'</td>'.
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
    <div class=gridcontainer>
   <div class="delinput">
    <form action="" method="post">
    <input type="text" name="delkey" placeholder="지울데이터 베이스 번호입력">
    <input type="submit" value="click">
   </form>
   </div> 
   <div>
   <select name="" class="teamname">
    <option value="">팀원명</option>
    <option value="이한기">이한기</option>
    <option value="최민지">최민지</option>
    <option value="박정범">박정범</option>
    <option value="백금옥">백금옥</option>
    <option value="이윤복">이윤복</option>
   </select> 
     </div>
     <div class="total"><span class="context"></span>&nbsp&nbsp&nbsp&nbsp&nbsp:건</div> 
     </div>
</div>  
   
<script>
 $('.teamname').change(function(){
   var $name = $(this).val();
   var sum = 0;
   $("table tr td:nth-child(4)").each(function(){
            if($(this).text() === $name){
                // 해당 팀원이름이 있는 행의 다섯 번째(td:nth-child(5)) 열에서 실적 가져와 합산
                sum += parseInt($(this).siblings("td:nth-child(6)").text().length);
            }
        });
        $('.context').text(sum);
  /* $('.tr').each(function(){
      var $thistext = $(this).find('td:eq(3)').text()   ;
      if($thistext ==$name){
       console.log ($(this).siblings("td:nth-child()").text() ) 
        //sum += parseInt($(this).siblings("td:nth-child(6)").text());
       
      }
    //  var $thistext_len= $(this).find('td:eq(5)').text().length;
   }) */
 });
 
</script>
</body>
</html>