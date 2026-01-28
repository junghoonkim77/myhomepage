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
        /* 전체 기본 글꼴 크기와 색상 */
body {
    font-family: "Noto Sans KR", Arial, sans-serif;
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #fafafa;
    color: #333;
}

/* 헤더 */
header {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

/* 컨테이너: 모바일에서는 한 줄 */
.container {
    display: block;
    width: 95%;
    margin: 0 auto;
}

/* 테이블 */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    font-size: 14px;
}

/* 테이블 헤더 */
thead td {
    background-color: #f0f0f0;
    font-weight: bold;
    text-align: center;
    padding: 8px;
    border: 1px solid #ccc;
}

/* 테이블 본문 */
tbody td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
}

/* 행 hover 효과 */
tr:hover {
    background-color: #f9f9f9;
}

/* 작은 화면에서 테이블 스크롤 */
.view {
    overflow-x: auto;
}

/* 링크 버튼 */
.addlink {
    display: block;
    margin: 15px auto;
    padding: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    font-size: 14px;
    width: 90%;
    max-width: 300px;
}

/* 링크 hover */
.addlink:hover {
    background-color: #45a049;
}

/* 반응형 글자 크기 */
@media (max-width: 480px) {
    body {
        font-size: 13px;
    }
    table {
        font-size: 13px;
    }
    header {
        font-size: 15px;
    }
}

    </style>

    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
<script src="../java/library.js"></script>
    <title>혈압기록페이지</title>
</head>
<body>
    <header>
    <?php 
include('phpgate.php');
echo '<h5>'.'('.date("Y/m/d").')'."   ".'혈압기록'.'</h5>';
?>
    </header>



    <div class="container">
  
    <div class="view">
        <table>
            <thead class="thead">
                <td>입력순서</td>
                <td>측정일시</td>
                <td>수축기 평균: <span class="hightext"></span></td>
                <td>이완기 평균: <span class="lowtext"></span></td>
                <td>메모</td>
                
                
            </thead>
            <tbody id="sales_data">
    <?php 
      
    $sql = "SELECT * FROM blood_record ORDER BY num ASC";
      $result = mysqli_query($conn,$sql);
      $row_count = mysqli_num_rows($result);
      $td = '';
      while($row = mysqli_fetch_array($result)){ 
        $td = $td."<tr class=listsort ><td>".$row['num'].'</td>'.'<td>'.$row['todaycheck'].'</td>'.
        '<td class="hipressure">'.$row['hipressure'].'</td>'.'<td class="lowpressure">'.$row['lowpressure'].'</td>'.'<td>'.$row['memo'].'</td>'
        .'</tr>';
     }
     echo $td;
    
     
    ?> 
       </tbody>
        </table>
    
    <a class="addlink" href="bp_input.php">혈압입력창으로 이동</a>
    </div>
    
   </div>
   
    
    <script>
        var Hipressure = 0;
        var Lowpressure = 0;
           $('.hipressure').each(function(){
          const hipressure = Number($(this).text());
            Hipressure += hipressure;
            } );            
              $('.hightext').text(Math.round(Hipressure / $('.hipressure').length));
         
              $('.lowpressure').each(function(){
                const lowpressure = Number($(this).text());
                Lowpressure += lowpressure;
              });
              $('.lowtext').text(Math.round(Lowpressure / $('.lowpressure').length));
     //---------------------------------------------혈압평균 구하고 셀에 넣(는 코드
     
    // $('.container').height()  ;

    $('header').on('click', function(){
     const containerHeight = $('.container').height();
     $('html').animate({ scrollTop: containerHeight }, 400);
    });
    </script>
</body>
</html>