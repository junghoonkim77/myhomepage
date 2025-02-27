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

     .total {
        border : 1px solid gray;
        width : 60px;
        background-color : yellowgreen;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
        margin-top : 5px;
     }
     .total1{
        border : 1px solid gray;
        width : 60px;
        background-color : yellowgreen;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
        margin-top : 5px;
     }
     .total2{
        border : 1px solid gray;
        width : 70px;
        background-color : skyblue;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
        margin-top : 5px;
     }

     .newtotal2{
        border : 1px solid gray;
        width : 100px;
        background-color : yellowgreen;
        font-size : 12px;
        padding-left : 10px;
        display : inline-block;
        margin-top : 5px;
     }

    #teamname{
        display : inline-block; 
        
    }

   .gridcontainer{
    margin-left :20px;
  /*  left : 320px; */

   }

   li{
    font-size : 10px;
    display : none;
   }
   
    </style>
    <title>세일즈누적</title>
</head>
<body>
    
    <?php
    include('phpgate.php');
    echo '<h5>'.'('.date("Y/m/d").')'."   ".'서울중앙통품세일즈&nbsp&nbsp&nbsp&nbsp총누적:&nbsp'.
    '<span class="'.'tsum">'.'</span>'.'<span>건</span>'.'</h5>';
    echo '<a href="sales_siljukcon.php">세일즈 가설관리창</a>&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href="../sale_today/">당일시도입력창</a>';
    
    
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

    $sql1 = "SELECT * FROM sales_success ORDER BY order_add ASC";
    $result = mysqli_query($conn,$sql1);
   
    $td='';
    $ul='';
    while($row=mysqli_fetch_array($result)){
    $td=$td.'<tr><td>'.$row['order_add'].'</td>'.'<td>'.$row['cusnum'].'</td>'.
    '<td>'.$row['cusname'].'</td>'.'<td>'.$row['teamname'].'</td>'.
    '<td>'.$row['comdate'].'</td>'.'<td>'.$row['prodname'].'</td>'.'</tr>';

    $ul=$ul.'<li class='.$row['teamname'].substr($row['comdate'],5,2).'>'.$row['comdate'].' /'.$row['cusname'].' /'.$row['teamname'].' /'.$row['cusnum'].' /'
    .$row['prodname'].'</li>';
    };
    
    $phpmon = date("m");
    ?>
    <h3><?=$phpmon.'월 현재'?> 개통건수 : <span class="nowmonth"></span></h3>
    <div class="container">
    <table id="TotalSucc" data-mon=<?="'".$phpmon."'"?>> 
     <thead><td>순서</td><td>고객번호</td><td>고객명</td><td>팀원명</td><td>개통일자</td><td>상품</td></thead>
     
        <?php echo $td ?>
     
    </table>
    <?php 
     $delkey = $_POST['delkey']??'';

     if(!empty($delkey)){
         $sqlDEL = "DELETE FROM sales_success WHERE order_add = $delkey"; 
         mysqli_query($conn,$sqlDEL);
         echo  $delkey.'번이 삭제됐습니다.' ;}
     
    ?>
    <div class="gridcontainer">
   <div class="delinput">
    <form action="" method="post">
    <input type="text" name="delkey" placeholder="지울데이터 베이스 번호입력">
    <input type="submit" value="click">
   </form>
   </div> 
   <div id="teamname">
   <p style="font-size :12px">개인별 :
   <select name="" class="teamname">
    <option value="">팀원명</option>
    <option value="이한기">이한기</option>
    <option value="최민지">최민지</option>
    <option value="박정범">박정범</option>
    <option value="백금옥">백금옥</option>
    <option value="이윤복">이윤복</option>
    <option value="박주영">박주영</option>
    <option value="김지훈">김지훈</option>
    
   </select>

   <select name="" class="sellectmon1">
    <option value="montotal1">월별팀원실적</option>
    <option value="01">1월</option>
    <option value="02">2월</option>
    <option value="03">3월</option>
    <option value="04">4월</option>
    <option value="05">5월</option>
    <option value="06">6월</option>
    <option value="07">7월</option>
    <option value="08">8월</option>
    <option value="09">9월</option>
    <option value="10">10월</option>
    <option value="11">11월</option>
    <option value="12">12월</option>
   </select>  
   </p>
     </div>
     
     <div>
     <div class="total">年누적:<span class="context"></span></div>
     <div class="total1">당月누적:<span class="context1"></span></div>
     <div class="newtotal2">月별:<span class="newtext2"></span></div><br>
     </div>

     <p style="font-size :12px ; display:inline-block;">팀단위 :
     <select name="" class="sellectmon">
    <option value="montotal">총누적건수</option>
    <option value="01">1월</option>
    <option value="02">2월</option>
    <option value="03">3월</option>
    <option value="04">4월</option>
    <option value="05">5월</option>
    <option value="06">6월</option>
    <option value="07">7월</option>
    <option value="08">8월</option>
    <option value="09">9월</option>
    <option value="10">10월</option>
    <option value="11">11월</option>
    <option value="12">12월</option>
   </select> 
   </p> 
   <div class="total2">.<span class="context2"></span></div>
   <button id="fullCopy" style="background-color:darkkhaki; font-size:12px;">전체복사</button>
   <table>
    <thead>
      <tr>
      <td>1월</td>
      <td>2월</td>
      <td>3월</td>
      <td>4월</td>
      <td>5월</td>
      <td>6월</td>
      <td>7월</td>
      <td>8월</td>
      <td>9월</td>
      <td>10월</td>
      <td>11월</td>
      <td>12월</td>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td id="01monDivide"></td>
      <td id="02monDivide"></td>
      <td id="03monDivide"></td>
      <td id="04monDivide"></td>
      <td id="05monDivide"></td>
      <td id="06monDivide"></td>
      <td id="07monDivide"></td>
      <td id="08monDivide"></td>
      <td id="09monDivide"></td>
      <td id="10monDivide"></td>
      <td id="11monDivide"></td>
      <td id="12monDivide"></td>
    </tr>
  </tbody>
  
    
   </table>
     </div>
  
     <div>
     <ul>
     <?php echo $ul ?>
     </ul>
    </div>

     </div> <!--플렉스 박스 끝줄-->
    
   <?php  mysqli_close($conn); ?>
  
</div>  
   
<script>
    //날짜 함수

var $tablemonth = $('table').attr('data-mon'); // 날짜를 php에서 구해옴
 
//$nummonth = parseInt($month); // 누적건수 표시를 위한 숫자 변환
//$nummonth1 = parseInt($month);// 누적건수 표시를 위한 숫자 변환
 var totalsum = 0;
 var totalsum1 = 0;

 // 누적 실적표시창 코드
 $("table tr td:nth-child(6)").each(function(){
  totalsum+=   parseInt( $(this).text().length ) ;
 });
  $('.tsum').text(totalsum-4);

  // 이번달 개통건수 표시창 코드 
  $("table tr td:nth-child(5)").each(function(){
   var $monthtxt1 =  $(this).text().slice(5,7) ;  //.slice(4);  `${hours < 10 ? `0${hours}` : hours}
      
       if($monthtxt1 === $tablemonth) {
        totalsum1 +=  parseInt($(this).siblings("td:nth-child(6)").text().length);
       }
    });
    $('.nowmonth').text(totalsum1); // 이번달 개통건수 옆에 표시될 내용



 const $teamname =[];   
 $('.teamname').change(function(){
   var $name = $(this).val();
   // 새로 추가한 코드 월별 컨설턴트 실적을 보이게 하는 코드를 위해 배열에 넣기 
   $teamname.length = 0;
   $teamname.push($name);
   console.log ($teamname);
   
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
   var $monthtxt =$(this).text().slice(5,7) ;  //.slice(4);
       if(($monthtxt == $tablemonth) && $name == $(this).siblings("td:nth-child(4)").text()) {
        sum1 +=  parseInt($(this).siblings("td:nth-child(6)").text().length);
       }
    }); //두번째 each문 끈
    $('.context1').text(sum1);  

    $('li.'+$name).css('display','block')
      
 });  //change이벤트 마지막

  // tr태그에 월별 클래스명 hide 넣기 
 $('tr').each(function(){
    var $addcla = ( $(this).children('td').eq(4).text().slice(5,7) );
    $(this).addClass('hide'+$addcla);
  });
  

  
 // 사이트 열리자마자 이번달 실적만 표로 보여주기
 var $minimontotal = 0;
  $('.sellectmon').val($tablemonth).prop('selected',true);
  $('tr').not('.'+'hide'+$tablemonth).hide();
  $('.hide').show();
  $('.'+'hide'+$tablemonth).each(function(){
         $minimontotal+= parseInt ($(this).children('td').eq(5).text().length)  ;
           })
         $('.context2').text($tablemonth+'월: '+$minimontotal+'건');

 //var tablewidth = $('table').outerWidth(true)+20  
// 셀렉트 태그를 이용해 월별 결과 숨기고 보이기 montotal
  $montotal = 0;
  $('.sellectmon').change(function(){
   
    var $sellectmonVAl = $(this).val();
    if($sellectmonVAl === "montotal"){
        $('tr').show();
        var tablewidth = $('table').outerWidth(true)+20 
        $('.gridcontainer').css('left',tablewidth+'px');
    }else{
        $('tr').not('.'+'hide'+$sellectmonVAl).hide() ;
        $('.hide').show();
        $('.'+'hide'+$sellectmonVAl).show();
        $('.'+'hide'+$sellectmonVAl).each(function(){
         $montotal+= parseInt ($(this).children('td').eq(5).text().length)  ;
           })
         $('.context2').text($sellectmonVAl+'월: '+$montotal+'건')
         $montotal = 0 ;
         var tablewidth1 = $('table').outerWidth(true)+20 
        $('.gridcontainer').css('left',tablewidth1+'px');
    };    
  }) //월별 결과 숨기기 코드 끝

  var $minitotal = 0
  var nowmon_nameArray = [];
  $('.sellectmon1').change(function(){
    var $seltmonVAl = $(this).val();
    var tname = $teamname[0];
    var nowmon_name = $seltmonVAl+tname ;
    nowmon_nameArray.push(nowmon_name);
    $('li').css('display','none'); //li없애고 시작

    $("table tr td:nth-child(5)").each(function(){
   var $monthtxt =$(this).text().slice(5,7) ;  //.slice(4);
       if(($monthtxt == $seltmonVAl) && tname == $(this).siblings("td:nth-child(4)").text()) {
         $(this).parent().addClass(nowmon_nameArray[0]);
        //sum1 +=  parseInt($(this).siblings("td:nth-child(6)").text().length);
       }
    });

    $('.newtext2').text($seltmonVAl+'월('+$('.'+nowmon_nameArray[0]).children('td:nth-child(6)').text().length+'건)' );
   
      nowmon_nameArray.length = 0 ;
   
      $('.'+tname+$seltmonVAl).css('display','block');
  })

  $('#fullCopy').on('click',function(){
    $lib.rangecopy('#TotalSucc');
  })

  //이건 css로 폭 유지하는 코드
  const $tablewidth = $('table').outerWidth(true)+20 
   $('.gridcontainer').css('left',$tablewidth+'px');
  
   // 월별실적을 전체적으로 보여주는 코드
   var viewMonsum = 0;
   var $viewMonsum ={'1':'','2':'','3':'','4':'','5':'','6':'','7':'','8':'','9':'','10':'','11':'','12':''};
   $("table tr td:nth-child(5)").each(function(a){
    const $monthtxt1 = $(this).text().slice(5,7);
    $(this).siblings('td:nth-child(6)').addClass($monthtxt1+'monDivide');
     }  
   )
 
   for(var t=1 ; t<=12 ; t++){
    if(t<10){
      $('.'+'0'+t+'monDivide').each(function(){
    viewMonsum+= $(this).text().length
   })
    }else{
      $('.'+t+'monDivide').each(function(){
    viewMonsum+= $(this).text().length
   })
    }
     $viewMonsum[t]=viewMonsum; //더한 총값 ( ㅠㅠ 누더기)
     if(t<10){
      $('#'+'0'+t+'monDivide').text($viewMonsum[t]+'건');
     }else{
      $('#'+t+'monDivide').text($viewMonsum[t]+'건');
     }
     
     viewMonsum = 0 ;
     
   }
    
   
</script>
</body>
</html>