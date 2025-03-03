<?php 
include('phpgate.php');

// 테이블의 총 행수를 구하는 쿼리
$count_sql = "SELECT COUNT(*) AS total_rows FROM vocbank";
$count_result = $conn->query($count_sql);
$total_rows = 0;
if ($count_result->num_rows > 0) {
    $count_row = $count_result->fetch_assoc();
    $total_rows = $count_row['total_rows'];}


$sql = "SELECT * FROM vocbank";
$result = $conn -> query($sql);
$vocurl = "../통품voc은행/";
$td ="";
if($result -> num_rows > 0){
 while($row =$result -> fetch_assoc()){
  $td=$td."<div>"."<a href=".$vocurl.$row['url']." target=\"frame\">".
              '<span class="dbnum">['.$row['num'].']</span>'.$row['title']."</a></div>";
            
  }
} ;


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>

 
.divhead{
 display:inline-block;
 border: 1px solid gray;
}
.divTableBody{
  display :grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: auto;
  font-size: 12px;
}

.divTableBody>div{ 
  border :1px solid gray;
}
 a {
  text-decoration: none;
 }
 a:hover{
  background-color: hsl(120, 75%, 81%);
 }
 
button{
  background-color: aqua;;
}
  
.container{
  display : grid;
  grid-template-columns: 1fr 3fr;
  grid-template-rows: auto;
 
}
iframe{
  width : 600px;
  height : 100vh;  
  position: sticky;
  top:50px;
}

.addvoc{
  opacity : 0;
}

  
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <title>통품VOC은행</title> 
 </head>
 <body>
  <h4>통품voc은행 <a class="addvoc" href="vocinsert.html">voc추가</a></h4> 
     <div class="container">
       <div class="basicframe">
        <div class="divhead">
          <div >
            <div >
                <div><span>현 등록건수: <?php echo $total_rows."건" ; ?></span></div>
            <div>
              <button class="button1">최하단이동⏬</button></div>
           </div>
          </div>
         
        </div>
        
      <div class="divTableBody">
        <?php 
        echo $td;
        ?>
        
      </div>
      
      </div>
        
        <div class="basicframe1" >
          <iframe  src = "" name="frame" style="border:none"></iframe>
        </div>
        
      </div>
        
  
  <script src="../java/voc_bank.js">  </script>
  <script>
         
     jQuery(function(){
     
           

      $('.button1').click(function(){
        var basicframeHi = $('.basicframe').height();
       $('html,body').stop().animate({scrollTop:basicframeHi});
       
      
      $('.button2').click(function(){
      $('html,body').stop().animate({scrollTop:'0px'});
      })  
      })

       
     })
  </script> 
 
    </body>

</html>
