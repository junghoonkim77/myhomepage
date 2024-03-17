<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>세일즈 수정창</title>
</head>
<body>
    <?php 
    include('phpgate.php');
    $editnum = $_POST['editsales']??'';
    
    $sql = "SELECT * FROM sales_board WHERE ordernum = $editnum"; 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_array($result)){
        $comdate = $row['hopedate'];
        $prodname = $row['prodname'];
    };

     ?>
     
     
     <form action="edit_update.php" method="get">
     <input type="date" name="comdate" value="<?=$comdate ?>" id="">
     <input type="text" name="prodname" value="<?=$prodname ?>" id="">
     <input type="hidden" name="ordernum" value="<?=$editnum ?>">
     <input type="submit" value="수정">
</form>
    



    <a href="세일즈실적관리.php">세일즈실적 관리창으로 이동</a>
</body>
</html>