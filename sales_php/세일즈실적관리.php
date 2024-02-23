<?php
 session_start();

$conn = mysqli_connect('localhost','root','amho73032721','abc_corp');

 if(!$conn){
     echo 'db에 연결하지 못했습니다.'.mysqli_connect_error();
 } else{
     echo '데이터 베이스에 접속했습니다.';
 }
?>


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
                
            </thead>
            <tbody id="sales_data">
    <?php 
      $sql = "SELECT * FROM sales_board";
      $result = mysqli_query($conn,$sql);
      $td = '';
      while($row = mysqli_fetch_array($result)){ 
        $td = $td."<tr><td>".$row['ordernum'].'</td>'.'<td>'.$row['inum'].'</td>'.
        '<td>'.$row['cusname'].'</td>'.'<td>'.$row['comdate'].'</td>'.'<td>'.$row['hopedate'].'</td>'.
        '<td>'.$row['teamname'].'</td>'.'<td>'.$row['prodname'].'</td>'.'<td>'.$row['spememo'].'</td>';
     }
     echo $td;
    ?>     
        </tbody>
        </table>
    </div>
    
    <div class="control">
      <form id="myform" action="세일즈실적관리.php" method="post">
      
        
        <input placeholder="고객번호" type="text" name="inum">
        <input placeholder="고객명" type="text" name="cusname">
        <input placeholder="가설일자" type="text" name="comdate">
        <input placeholder="설치예정일"type="text" name="hopedate">
        <input placeholder="컨설턴트"type="text" name="teamname">
        <input placeholder="상품종류"type="text" name="prodname">
        <input placeholder="고객특이사항"type="text" name="spememo"><br>
        <input class="button1" type="submit" value="가설 고객추가">
    
     </form>    
    </div>
    </div>
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

        if (mysqli_query($conn, $sql1)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "All fields are required";
    };

        
       

     
       ?> 
    
    <div id="notepad">
        <textarea placeholder="취소 및 기타사항 입력" cols="100" rows="28">

        </textarea>
    </div>
      <div class="backup">
       <ul></ul>
        
      </div>
        

    <script>
        jQuery(function(){

            $('#myform').submit(function(e){
        e.preventDefault(); // 폼 기본 제출 동작 방지

        // 폼 데이터를 직렬화하여 가져옴
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
    });

       
          // 휴대폰 번호 복사하기
         $('.phoneNumber').click(function(){
          var $phonenum = $(this).text();
            $lib.clipcopy($phonenum);
             })

        $('#notepad textarea').on('input',function(){
            var $notepadTextval = $('textarea').val();
            localStorage.setItem('$notepadval',$notepadTextval);
            
            console.log ( $notepadTextval_val )
            
        })
        var $notepadTextval_val = localStorage.getItem('$notepadval');
        $('textarea').val($notepadTextval_val);
       
         // 백업하기 위해 전체 내용을 복사하기 
      

}) //제일바깥쪽
        
      
        
       
    </script>
</body>
</html>