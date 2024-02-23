<?php
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
                <td>삭제❌</td>
            </thead>
    <?php 
      $sql = "SELECT * FROM msg_board";
      $result = mysqli_query($conn,$sql);
      $td = '';
      while($row = mysqli_fetch_array($result)){ 
        $td = $td."<tr><td>".$row['ordernum'].'</td>'.'<td>'.$row['inum'].'</td>'.
        '<td>'.$row['cusname'].'</td>'.'<td>'.$row['comdate'].'</td>'.'<td>'.$row['hopedate'].'</td>'.
        '<td>'.$row['teamname'].'</td>'.'<td>'.$row['prodname'].'</td>'.'<td>'.$row['spememo'].'</td>';
     }
    ?>     
        </table>
    </div>
    
    <div class="control">
      <form action="세일즈실적관리.php" method="post">
      
        <input placeholder="순번" type="text">
        <input placeholder="고객번호" type="text" name="inum">
        <input placeholder="고객명" type="text" name="cusname">
        <input placeholder="가설일자" type="text" name="comdate">
        <input placeholder="설치예정일"type="text" name="hopedate">
        <input placeholder="컨설턴트"type="text" name="teamname">
        <input placeholder="상품종류"type="text" name="prodname">
        <input placeholder="고객특이사항"type="text" name="spememo">
        <input class="button1" type="submit" value="가설 고객추가">
    
     </form>    
    </div>
    </div>
       <?php 
        $inum = $_POST['inum'] ?? ''; // 기본값 설정
        $cusname = $_POST['cusname'] ?? '';
        $comdate = $_POST['comdate'] ?? '';
        $hopedate = $_POST['hopedate'] ?? '';
        $teamname = $_POST['teamname'] ?? '';
        $prodname = $_POST['prodname'] ?? '';
        $spememo = $_POST['spememo'] ?? '';
       // $ordernum = $_POST['ordernum'];
      
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

   
    var $salesobj = {};
    var $salesview =[];
    var $salesDelkey =[];
      $('.button1').click(function(){
        $('input[type=text]').each(function(idx){
        // input의 placeholder값을 가져와서 $salesobj의 키값으로 사용하고 거기에 input의 밸류를 담는다.

        var $placehold = $(this).attr('placeholder')
        var $val = $(this).val();
        console.log(idx);
        $salesobj[$placehold ] = $val;
        }) //여기까지 반복해서 값을  $salesobj 객체에 담는다.

        // key값이 중복되지 않게 고객번호와 순서를 변수에 담는다.
        var $keyName = $('input[type=text]').eq(2).val() ;
        var $keySep = $('input[type=text]').eq(0).val() 
        var  $salesob_str = JSON.stringify ( $salesobj ); //객체값을 str변수로
         //텍스트 값을 localstorage에 담는다.

        localStorage.setItem(`SA${$keySep}@${$keyName}`,$salesob_str);
        location.reload();
             
      }) // 여기까지가 localstorage에 값 저장하기
      
      for ( k in localStorage){
         if (k.slice(0,2)=="SA"){
          var Keysa =  localStorage.getItem(k);
          var $Keysa = JSON.parse (Keysa );
          $salesview.push($Keysa);
          
          }
       }
         
        $salesview.sort((a, b) => a['순번'] - b['순번']);
        
       
       
       // 로컬스토리지 내용 꺼내서 테이블에 보여주기
      for ( var i=0 ; i<$salesview.length ; i++){
          
        $('.thead').before(`<tr class="salesCount">
            <td>${$salesview[i].순번}</td>
            <td class="phoneNumber">${$salesview[i].고객번호}</td>
            <td>${$salesview[i].고객명}</td>
            <td>${$salesview[i].가설일자}</td>
            <td>${$salesview[i].설치예정일}</td>
            <td>${$salesview[i].컨설턴트}</td>
            <td>${$salesview[i].상품종류}</td>
            <td>${$salesview[i].고객특이사항}</td>
            <td class="salesdel" id="${$salesview[i].순번}" data-key="${$salesview[i].고객명}">삭제❌</td>
            </tr>`)      
         }  
         //  로컬스토리지 번호 지우기
         $('.salesdel').click(function(){
           var $delKey = $(this).attr('data-key');
           var $delid = $(this).attr('id');
           localStorage.removeItem(`SA${$delid}@${$delKey}`)
           location.reload();
         }) 

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
        $('.button2').click(function(){
       $salesview.forEach(ele => {
           $('.backup ul').append(`<li>${ele.순번}/${ele.고객번호}/${ele.고객명}/${ele.가설일자}/${ele.설치예정일}/${ele.컨설턴트}
           /${ele.상품종류}/${ele.고객특이사항}</li>`)
        });
         $('.backup').append(`<pre>${$notepadTextval_val}</pre>`)
        var $totalText = document.querySelector('.backup').innerText
        navigator.clipboard.writeText($totalText );
        $('.backup ul').remove();
        $('.backup pre').remove();
         
    })

}) //제일바깥쪽
        
      
        
       
    </script>
</body>
</html>