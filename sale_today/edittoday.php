<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>세일즈 수정창</title>
</head>
<body>
    <?php 
    include('connect.php');
    $editnum = $_GET['editkey']??'';
    
    $sql = "SELECT * FROM sales_today WHERE num = $editnum"; 
     // 만약 위에서 *표로 다 갖고 오는게 아니라면 name이나 number 같이 지정한 값만 가져올수 있다.
     $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_array($result)){
        
        $internet = $row['internet'];
        $tv = $row['tv'];
        $mobile = $row['mobile'];
        $success = $row['success'];
        $sr = $row['sr'];
        
    };

     ?>
     
     <form id="todayinsert" action="edit_todaycomplete.php" method="post">
             <fieldset>
                
                  <label for="internet">인터넷:</label>  
                  <input id="internet" class="inputnum" placeholder="인터넷" type="number" max =1 min=0 value=<?=$internet ?> name="internet">
                  <label for="tv">TV:</label>  
                  <input id="tv" class="inputnum"  placeholder="티비" type="number" max =1 min=0 value=<?=$tv ?> name="tv">
                  <label for="mobile">모바일:</label>  
                  <input id="mobile" class="inputnum"  placeholder="모바일" type="number" max =1 min=0 value=<?=$mobile ?> name="mobile">
                  <label for="success">권유성공:</label>  
                  <input id="success" class="inputnum"  placeholder="권유성공" type="number" max =1 min=0 value=<?=$success ?> name="success">
                  <label for="sr">sr번호:</label>  
                  <input id="sr"  placeholder="sr번호" type="text" value=<?=$sr?> name="sr">
                  <input id="num"  placeholder="sr번호" type="hidden" value=<?=$editnum?> name="ordernum">
                  <input type="submit"  >추가버튼 클릭</input> 
             </fieldset> 
              
           </form>  
    



    <a href="세일즈실적관리.php">세일즈실적 관리창으로 이동</a>
</body>
</html>