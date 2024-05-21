<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div{
            color : blue;
            font-weight : bold;
        }
    </style>
    <title>json_encode연습</title>
</head>
<body>
    <?php 
    $test ="김정훈입니다.";
    ?>
    <div>

    </div>
  <script>
    var test = JSON.parse('<?php echo json_encode($test) ?>');
    document.querySelector('div').innerHTML = test;
  </script>
</body>
</html>