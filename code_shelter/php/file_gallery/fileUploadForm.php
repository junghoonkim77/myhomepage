<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>이미지 업로드</title>
</head>
<body>
   <?php include('menu.html') ?>
    
    <form method="post" enctype="multipart/form-data" action="gallery_upload_form_ok.php">
        이미지 업로드 : <input type="file" name="photo" id="image_upload">
            <button id="upload_btn">업로드 확인</button>
    </form>
    <script>

      $('#upload_btn').click(function(event){
        
       if($('#image_upload').val() == ""){
        event.preventDefault();
         alert('이미지 파일을 첨부해주세요')
         return false;
       } 
      })

    
      
    </script>
</body>
</html>