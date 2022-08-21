<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
    </head>
<body>
    <?php
  $name_str = ("드라이나~!");
  $password = $_GET["password"];
    
    if($password=="1111") {
        echo $name_str ;
    } else {
     echo " 누구세요?";
         }
?>
</body>
</html>