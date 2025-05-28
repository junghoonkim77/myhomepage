<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">

</script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">

</script> 

<style>

   html,body{
      height : 100vh;
      width : 100vw;
   }

   .container{
      width : 100%;
    
   }

   table{
      border : 1px solid gray;
      border-collapse: collapse;
      font-size : 13px;
   }

   td {
      border : 1px solid gray;
   }

   #success{
    background-color: powderblue;
   }

   #delnum{
    width : 5rem;
    margin-top: 1rem;
    display :inline-block;
   }

   #salescomp{
    display : inline-block;
   }

   #headname{
    display : inline-block;
   }

   #cunsulname{
    margin-bottom : 1rem;
   }

   fieldset{
    font-size : 13px;
    
   }
   
   tr:hover{
    background-color : skyblue;
   }
</style>


   <title>모바일 판매 실적</title>

</head>

<body>
    <a href="../sales_php/sales_siljukcon.php">IT 실적창 이동</a> 
    <button id="allshow">이전실적 전체 확인</button>
<?php include('phpgate.php');

$sql = "SELECT * FROM Msales_data";
$result = mysqli_query($conn,$sql);
$td ="";
while($row=mysqli_fetch_array($result)){
 $td=$td."<tr>
           <td class=\"comadd\" data-num=".$row['num'].">".$row['num']."[번]개통일추가</td><td>".
           $row['cunsulname']."</td><td>".
           $row['salesIn']."</td><td>".
           $row['cusname']."</td><td class=\"finish\">".
           $row['salescomp']."</td>
           </tr>";
}


?>
 <div id="head">

   <h3 id="headname"><?php echo '서울중앙 통화품질팀 M세일즈 '.date('n').'월 현황' ?></h3>
   &nbsp;&nbsp;&nbsp;&nbsp;
   <span style="font-weight:bold">[이달 목표]:</span>
   <span style="font-weight:bold" id="goal">9</span><span>건</span>
   <span style="font-weight:bold"><?php echo "[".date('n')."월 귀속실적]" ?></span>
   &nbsp;
   <span style="font-weight:bold" id="nowresul" ></span><span>건</span>

   <div id="progressBar">

      <div>


      </div>

   </div>

 </div>

 <div class="container">

   <div id="ing">

      <table>

         <thead>

         <td>접수순서</td>

         <td>팀원명</td>

         <td>접수성공일자</td>

         <td>고객식별번호</td>

         <td>전산개통일자</td>

      </thead>

         <tbody>

            <?php 
            echo $td;
            ?>

              

         </tbody>
       
      </table>
     
        
     
   </div>

 </div>

 <fieldset>
    <legend>모판유치성공 입력</legend>
    <div id="input">
   <form id="Msales" method="post" action="Minsert.php">
   
   <select name="cunsulname" id="cunsulname">
    <option value="">팀원명</option>
    <option value="이한기">이한기</option>
    <option value="박정범">박정범</option>
    <option value="최민지">최민지</option>
    <option value="백금옥">백금옥</option>
    <option value="이윤복">이윤복</option>
    <option value="박주영">박주영</option>
    <option value="김지훈">김지훈</option>
   </select><br>

   <label for="salesIn">접수성공일자</label> 
   <input type="date" name="salesIn" id="salesIn" autocomplete="off"><br>
   
   <label for="cusname">고객정보[ID,SR,폰번호등등]</label> 
   <input type="text" name="cusname" id="cusname" autocomplete="off"><br>
      
   <button id="addbutton">추가</button>
   </form>
 </fieldset>
 
  <fieldset>
    <legend>개통완료시 개통일자추가</legend>
    <form method="post" action="Mupdate.php">
    <label for="addnumber">개통추가 접수순서</label> 
    <input type="number" name="addnumber" id="addnumber" autocomplete="off">
    <label for="salescomp">개통일자</label> 
    <input type="date" name="salescomp" id="salescomp" autocomplete="off">
    <button id="addbutton2">개통일자_추가</button>
   </form>
  </fieldset>
   

  <form id="delnum" method="post" action="mdelete.php">
    <input type="number" name="delnum" id="delnum" autocomplete="off">
    <button>삭제</button>
  </form> 

 </div>
<script src="../java/library.js"></script>
<script> 

// 날짜가 있으면 클래스 추가, 없으면 기본적으로 설정한 클래스만
const $now = new Date();
const $nowYear = $now.getFullYear();
const $nowMon = ($now.getMonth()+1).toString();
const $nowMonText = $nowMon.length == 1 ? "0"+$nowMon : $nowMon ;
const $seperClass = "m"+$nowYear+$nowMonText;


$('.finish').each(function(idx,ele){
   var tdtext = $(this).text().trim();
   var tdtextYear = 'm'+tdtext.slice(0,4)+tdtext.slice(5,7);
   console.log(tdtextYear);
   if(tdtext == ""){
    $(this).addClass('yet')
    }else if(tdtext !== "" && tdtextYear !== $seperClass){
       $(this).addClass('hidden');
    }else{
    $(this).addClass($seperClass);
   }
  })

  $('.hidden').parent().css('display','none');
  console.log($('.'+$seperClass));

//  nowresul
const $goalNum =Number($('#goal').text()) ;
const $nowresulCount = $('.finish').filter('.'+$seperClass).length;
if($goalNum > $nowresulCount){
 $('#nowresul').css('color','red')
}else{
 $('#nowresul').css({'color':'blue','font-size':25+'px'})   ;
}
    

$('#nowresul').text($nowresulCount);

$('#addbutton').click(function(e){
    if($('#cunsulname').val().trim() !==""){
      $('#Msales').submit();
    }else{
        alert('팀원명을 입력하세요~!')
        return false;
          }
    }
  )

 $('.comadd').click(function(){
   const $date_num = $(this).attr('data-num');
   $('#addnumber').val($date_num);
   $('#salescomp').focus().css({'background-color':'powderblue'});
 })
    
 $('td').on('click',function(){
   $lib.copyall($(this).text().trim());
 })   

 $('#allshow').click(function(){
   $('.hidden').parent().css('display','table-row');
   
 })
</script>


 


</body>

</html>