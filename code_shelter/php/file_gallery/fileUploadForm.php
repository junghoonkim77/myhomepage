<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 업로드</title>
</head>
<body>
   <?php include('menu.html') ?>
    
    <form method="post" enctype="multipart/form-data" action="gallery_upload_form_ok.php">
        이미지 업로드 : <input type="file" name="photo" id="">
            <button id="upload_btn">업로드 확인</button>
    </form>
</body>
</html>