<?php 
include('phpgate.php');

$sql = "SELECT * FROM vocbank";
$result = $conn -> query($sql);
$vocurl = "../통품voc은행/";
$td ="";
if($result -> num_rows > 0){
 while($row =$result -> fetch_assoc()){
  $td=$td."<div>"."<a href=".$vocurl.$row['url']." target=\"frame\">".
              "<span class=\"order\"></span>".$row['title']."</a></div>";
            
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

  
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <title>통품VOC은행</title> 
 </head>
 <body>
  <h4>통품voc은행</h4> 
     <div class="container">
       <div class="basicframe">
        <div class="divhead">
          <div >
            <div >
            <div>통품voc은행</div>
            <div><span>현 등록건수:</span>
            <span id="count"></span></div>
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
     
      var $atotal = $('.order');
     
         $atotal.each(function($idx){
            $(this).text(`${$idx}.`);
         })
     
      

      $('.button1').click(function(){
        var basicframeHi = $('.basicframe').height();
       $('html').stop().animate({scrollTop:basicframeHi});
      
      $('.button2').click(function(){
      $('html').stop().animate({scrollTop:'0px'});
      })  
      })

      let CountAtag = document.getElementsByTagName('a').length;
      document.getElementById('count').innerHTML = String(`${CountAtag}건`);
  
     })
  </script> 
 
    </body>

</html>
