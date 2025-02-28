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
    $test1 = ['name' => '김정훈', 'age' => 25, 'job' => 'programmer'];
    ?>
    <div>

    </div>
  <script>
    var test = JSON.parse('<?php echo json_encode($test) ?>');
    document.querySelector('div').innerHTML = test;
    var test1 = JSON.parse('<?php echo json_encode($test1) ?>');
    console.log(test1);
  </script>
</body>
</html>