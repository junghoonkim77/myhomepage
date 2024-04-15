<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 


    <title>prevent 테스트</title>
</head>
<body>
    
    <?php
    echo '<a href="'.'prevent_test.php?pre=이것은&vent=테스트입니다.'.'"'.'>테스트</a>';
    ?>
    <?php 
    $pre = $_GET['pre'] ??'';
    $vent = $_GET['vent'] ??'';
    echo "<div>".$pre.$vent."</div>"
    ?>
    <script>
     $(document).on('click',function(e){
        e.preventDefault();
     })
    </script>
</body>
</html>