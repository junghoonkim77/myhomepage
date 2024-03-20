<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script>
<script src="../java/library.js"></script>

    <style> 
    .container{
        display : flex;
        margin-top : 10px;

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
        
        
     }
     .total {
        border : 1px solid gray;
        width : 60px;
        background-color : skyblue;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
     }
     .total1{
        border : 1px solid gray;
        width : 60px;
        background-color : skyblue;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
     }
    #teamname{
        display : inline-block; 
    }
    </style>
    <title>세일즈누적</title>
</head>
<body>
    
    <?php
    include('phpgate.php');
    echo '<h5>'.'('.date("Y/m/d").')'."   ".'서울중앙통품세일즈&nbsp&nbsp&nbsp&nbsp총누적:&nbsp'.
    '<span class="'.'tsum">'.'</span>'.'<span>건</span>'.'</h5>';
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
    <h3><?=date("m").'월 현재'?> 개통건수 : <span class="nowmonth"></span></h3>
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
   <div id="teamname">
   <select name="" class="teamname">
    <option value="">팀원명</option>
    <option value="이한기">이한기</option>
    <option value="최민지">최민지</option>
    <option value="박정범">박정범</option>
    <option value="백금옥">백금옥</option>
    <option value="이윤복">이윤복</option>
   </select> 
     </div>
     <div class="total">총건수:<span class="context"></span></div>
     <div class="total1">이번달:<span class="context1"></span></div> 
     </div> 
     </div>
     
   <?php  mysqli_close($conn); ?>
  
</div>  
   
<script>
    //날짜 함수
var[$year,$month,$day,$hour,$minutes,$timeHMS,$timeYMD,$timeYMD2] =$lib.$time();

$nummonth = parseInt($month); // 누적건수 표시를 위한 숫자 변환
$nummonth1 = parseInt($month);// 누적건수 표시를 위한 숫자 변환
 var totalsum = 0;
 var totalsum1 = 0;

 // 누적 실적표시창 코드
 $("table tr td:nth-child(6)").each(function(){
  totalsum+=   parseInt( $(this).text().length ) ;
 });
  $('.tsum').text(totalsum-2);

  // 이번달 개통건수 표시창 코드 
  $("table tr td:nth-child(5)").each(function(){
   var $monthtxt1 = parseInt( $(this).text().slice(5,7) )  //.slice(4);
       if($monthtxt1 == $nummonth1) {
        totalsum1 +=  parseInt($(this).siblings("td:nth-child(6)").text().length);
       }
    });
    $('.nowmonth').text(totalsum1); // 이번달 개통건수 옆에 표시될 내용


 $('.teamname').change(function(){
   var $name = $(this).val();
   var sum = 0;
   var sum1 = 0;
   $("table tr td:nth-child(4)").each(function(){
            if($(this).text() === $name){
                // 해당 팀원이름이 있는 행의 다섯 번째(td:nth-child(5)) 열에서 실적 가져와 합산
                sum += parseInt($(this).siblings("td:nth-child(6)").text().length);
            }
        }); //첫번째 each문 끝 
        $('.context').text(sum);
       
    $("table tr td:nth-child(5)").each(function(){
   var $monthtxt = parseInt( $(this).text().slice(5,7) )  //.slice(4);
       if(($monthtxt == $nummonth) && $name == $(this).siblings("td:nth-child(4)").text()) {
        sum1 +=  parseInt($(this).siblings("td:nth-child(6)").text().length);
       }
    }); //두번째 each문 끈
    $('.context1').text(sum1);  
      
 });
 
 
</script>
</body>
</html>