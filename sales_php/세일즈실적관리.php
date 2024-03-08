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
        :not(h2) {
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

       .subbtn{
        position : absolute;
        top : 10px;
       }
        
       li{
        list-style :none;
       } 
       
       a{
        text-decoration : none;
       }
       .texframe{
        display : inline-block;
        border : 1px solid gray;
        width : 45%;
       }

       .addlink{
        display : block;
        margin-top : 10px;
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
        
    </div>
    
  
    </div>
   
    <div id="notepad">
        
    <?php 
    $txtmemo = $_POST['texmemo'] ?? '';
    $deltex = $_GET['deltex'] ?? '';
    if(!empty($deltex)){
        $sqlDEL1 = "DELETE FROM textmemo WHERE com_num = $deltex ";
        mysqli_query($conn, $sqlDEL1);
     }
    
     if(!empty($txtmemo)){
            $sql2 = "INSERT INTO textmemo (memo) VALUES ('$txtmemo')";
            mysqli_query($conn, $sql2);
         }
        
          
        $test2 = '';
        $sqlmemo = "SELECT * FROM textmemo";
        $result2 = mysqli_query($conn,$sqlmemo);
        
        while($row2 = mysqli_fetch_array($result2)){
            $test2 = $test2.'<li>'.'<span>'.'_'.
            $row2['memo'].'<a href="세일즈실적관리.php?deltex='.$row2['com_num'].'"'.'>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   삭제'.
            '</a>'.'</li>'
             ;
           }; 
               
        ?>
       
       
    </div>
    <div class="texframe"><?php echo $test2 ?></div>
    <a class="addlink" href="sales_Gate.html">추가 입력창 이동 </a>
      
    

    <script src="../java/library.js"></script>
    <script>
        jQuery(function(){

                
          // 휴대폰 번호 복사하기
        $('td').click(function(){
          var $tdtext = $(this).text();
          console.log($tdtext);
            $lib.clipcopy($tdtext);
             })  

       //HTTPS 환경에서 실행: navigator.clipboard.writeText()는 보안상의 이유로 HTTPS 환경에서만 동작합니다. 따라서 코드가 HTTPS로 제공되고 있는지 확인하세요.
         // 백업하기 위해 전체 내용을 복사하기 
      

})*/   //제일바깥쪽
        
      
        
       
    </script>
</body>
</html>