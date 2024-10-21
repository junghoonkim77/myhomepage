<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 리스트</title>
</head>
<body>
    <?php include 'menu.html'; ?>
    <div class="wrapper">
        <?php 
         $d = dir('./upload');
         while($file = $d -> read()){
            if($file== "." || $file ==".."){
                continue;  
              }
              $arr = explode('.',$file);
              $ext= end($arr);
              if( $ext=="jpg" || $ext =="JPG" || $ext == "png" || $ext == "PNG" || $ext == "jpeg" ){
                echo "
                <div class='img_div'>".
                    "<img src = "."upload/".$file.">".
                "</div>";
                
              }
         }
        ?>
    </div>
</body>
</html>