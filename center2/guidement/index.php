<?php 
include ('phpgate.php');


$sql ="SELECT * FROM guidement ORDER BY id ASC";
$result = mysqli_query($conn,$sql);
$addtable="";
while($row = mysqli_fetch_array($result)){
  
$addtable .= "<tr class=".$row['casessort'].">
    <td style='background-color : #d9d9d9;'>"."<span id='rowid'>"."[".$row['id']."</span>"."] ".$row['cases']."</td>
    <td>".nl2br($row['content'])."</td>
</tr>";
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <link href="../../css/guidement.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
        </script> 
        <script src="../java/tabcontent.js" type="text/javascript"></script>
        <script src="../java/library.js"></script>
        <script>
            $( function() {
              $( "#tabs" ).tabs();
            } );
            </script>
        <style>
          
            table{ border:1px solid gray}
            th{ border:1px solid gray ; background-color:lightgray}
            td{ border:1px solid gray ; cursor:pointer}
            .cusments,.banron,.tip{display:none};
            .firsttd{background-color: gray;}
            
        </style>
    </head>
<body>
<h5><a href="guideAdd.php">추가</a></h5>
<div id="tabs" >
    <ul class="tabs" data-persist="true">
        <li data-class="vocments"><a href="#tabs-1">문의별 멘트 </a></li>
        <li data-class="cusments"><a href="#tabs-2">보유 상품별 멘트</a></li>
        <li data-class="banron"><a href="#tabs-3">반론극복</a></li>
        <li data-class="tip"><a href="#tabs-4">TIP(단선방지,호전환 메모활용)</a></li>
        
    </ul>
    <div style ="height:100%" class="tabcontents">
        <div id="tabs-1">
        <table><thead style="font-size:14px;"><tr><th>구분</th><th>Guide-line 멘트</th></tr></thead>
            <tbody>
                
                <?php echo $addtable; ?>
        
            </tbody>
        </table>
        </div>
       
    <div id="tabs-2">
         <table><thead><tr><th>구분</th><th>Guide-line 멘트</th></tr></thead>
            <?php echo $addtable; ?>
        </table>
    </div>
    <div id="tabs-3">
         <table><thead><tr><th>구분</th><th>Guide-line 멘트</th></tr></thead>
             <?php echo $addtable; ?>
        </table>
    </div>       
       
    <div id="tabs-4" >
      <table><thead><tr><th>구분</th><th>Guide-line 멘트</th></tr></thead>
            <?php echo $addtable; ?>
        </table>        
    </div>
       
  
    </div>
</div>
<script>
    $('li').click(function(){
        var cls = $(this).attr('data-class');
        $('.'+cls).show();
        $('.vocments,.cusments,.banron,.tip').not('.'+cls).hide();
    });
</script>
</body>
</html>


