<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" 
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" 
    integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" 
    crossorigin="anonymous"></script>
  <script src="../java/library.js"></script>
    <style>
        *{
            font-size : 12px;
        }
        .container{
            display : grid;
            grid-template-columns: 2fr 1fr;
            width : 65%;
        }
        table {
            border :  1px solid gray ;
            border-collapse : collapse
   
        }
         td{
            border : 1px solid gray ;
        }
        .control{
            display : flex;
            flex-wrap: wrap;
            width : 250px;
            }
        .control > * {
            flex-basis :100px;
            flex-grow :1;
            flex-direction: row;
         }
        .salesdel {
            cursor : pointer;
        }

        tr:hover{
            background-color: blanchedalmond;
        }
        #notepad{
            position : relative;
            margin-top : 15px;
        }

        #notepad button{
            position : absolute;
            left : 45em;
            bottom : 10px;
        }

        
               
    </style>

    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>★통품팀 Sales실적관리창★</title>
</head>
<body>
<?php 
include('phpgate.php');
?>

    <div class="container">
    
    <div class="view">
        <table>
            <thead class="thead">
                <td>접수순서</td>
                <td>번호</td>
                <td>고객명</td>
                <td>가설일자</td>
                <td>설치예정일자</td>
                <td>컨설명</td>
                <td>상품명</td>
                <td>고객특이사항_메모</td>
                <td>삭제</td>
                
            </thead>
            <tbody id="sales_data">
    <?php 
      
    $ordernum = $_POST['ordernum'] ?? ''; 
    $inum = $_POST['inum'] ?? ''; // 기본값 설정
    $cusname = $_POST['cusname'] ?? '';
    $comdate = $_POST['comdate'] ?? '';
    $hopedate = $_POST['hopedate'] ?? '';
    $teamname = $_POST['teamname'] ?? '';
    $prodname = $_POST['prodname'] ?? '';
    $spememo = $_POST['spememo'] ?? ''; 
       
    if (!empty($inum) && !empty($cusname) && !empty($comdate) && !empty($hopedate) &&
    !empty($teamname) && !empty($prodname) && !empty($spememo)) {

    $sql1 = "INSERT INTO sales_board (inum, cusname, comdate, hopedate, teamname, prodname, spememo) 
            VALUES ('$inum', '$cusname', '$comdate', '$hopedate', '$teamname', '$prodname', '$spememo')";
            mysqli_query($conn, $sql1);
    } 


   $sql = "SELECT * FROM sales_board";
      $result = mysqli_query($conn,$sql);
      $td = '';
      while($row = mysqli_fetch_array($result)){ 
        $td = $td."<tr><td>".$row['ordernum'].'</td>'.'<td>'.$row['inum'].'</td>'.
        '<td>'.$row['cusname'].'</td>'.'<td>'.$row['comdate'].'</td>'.'<td>'.$row['hopedate'].'</td>'.
        '<td>'.$row['teamname'].'</td>'.'<td>'.$row['prodname'].'</td>'.'<td>'.$row['spememo'].'</td>'.
        '<td>'.'<form action='.'세일즈실적관리.php'." ".'method='.'post'.'>'.
        '<input type=submit'." ".'name='.'delkey'." ".'value='.$row['ordernum'].''.'>'.'</form>'.
        '</td>';
     }
     echo $td;
     
    ?> 
       </tbody>
        </table>
        <?php 
     $user_delnum =$_POST['delkey'] ?? ''; 

     if(!empty($user_delnum)){
         $sqlDEL = "DELETE FROM sales_board WHERE ordernum = $user_delnum"; 
         mysqli_query($conn,$sqlDEL);
         echo $user_delnum.'번이 삭제됐습니다.' ;
     }
     ?>
        <a href="sales_Gate.html">추가 입력창 이동 </a>
    </div>
    
  
    </div>
   
    <div id="notepad">
        
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $texmemo = $_POST['texmemo'] ?? '';
    
            // SQL Injection 방지를 위해 prepared statement를 사용하는 것이 좋습니다.
            $stmt = $conn->prepare("UPDATE textmemo SET memo = ? WHERE com_num = 1");
            $stmt->bind_param("s", $texmemo);
            $stmt->execute();
            $stmt->close();
        }
       
        $test2 = '';
        $sqlmemo = "SELECT * FROM textmemo";
        $result2 = mysqli_query($conn,$sqlmemo);
        
        while($row2 = mysqli_fetch_array($result2)){
            $test2 = $test2.$row2['memo'];
        };
               
        ?>
        <form action="세일즈실적관리.php" method="post">
        <textarea class="texmemo" cols="60" rows="30" id="texmemo" name="texmemo"><?php echo $test2; ?></textarea>
        <input type="submit" value='메모저장'>;
       </form>
    </div>
      
    <script src="../java/library.js"></script>
    <script>
        jQuery(function(){

         

           /* $('#myform').submit(function(e){
        e.preventDefault();  폼 기본 제출 동작 방지

         폼 데이터를 직렬화하여 가져옴
        var formData = $(this).serialize();

        // Ajax 요청
        $.ajax({
            type: 'POST',
            url: '세일즈실적관리.php',
            data: formData,
            success: function(response){
                // 성공적으로 응답을 받으면 새로운 레코드 메시지를 표시
                alert(response);

                // 성공적으로 데이터를 추가한 경우, 테이블을 갱신
                $('#sales_data').html(response);
                //load('세일즈실적관리.php #sales_data');
                
            
                // 폼을 초기화하여 입력 필드를 비움
                $('#myform')[0].reset();
            },
            error: function(xhr, status, error){
                // 오류 발생 시 오류 메시지를 표시
                console.error(xhr.responseText);
            }
        });
    });     */

       
          // 휴대폰 번호 복사하기
        $('.phoneNumber').click(function(){
          var $phonenum = $(this).text();
            $lib.clipcopy($phonenum);
             })  

       
         // 백업하기 위해 전체 내용을 복사하기 
      

})*/   //제일바깥쪽
        
      
        
       
    </script>
</body>
</html>