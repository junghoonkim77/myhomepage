<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .showtable td{
           border : 1px solid gray;
        }
        .realtable{
            opacity : 0;
            font-size: 10px;
        }
        .realtable td{
            padding : 0px;
        }
        .head{
            display : inline-block;
            cursor : pointer;
            background-color: skyblue;
            box-shadow: 2px 2px 2px 0;
        }
        .board {
            position : relative;
        }
        .miniboard {
            position : absolute;
            bottom : 0px;
            left : 280px;
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 


    <title>당일 시도건취합</title>
</head>
<body>
    <?php 
    include('connect.php');
    echo "<br><br>"
    ?>
    <a href="input.html">당일 입력창이동</a> 
    <div class="board">
    <label for="select">팀원별 당일 시도건수</label>    
    <select id="select" name="" class="teamname">
    <option value="">팀원명</option>
    <option value="이한기">이한기</option>
    <option value="최민지">최민지</option>
    <option value="박정범">박정범</option>
    <option value="백금옥">백금옥</option>
    <option value="박주영">박주영</option>
    <option value="이윤복">이윤복</option>
    <option value="최아람">최아람</option>
   </select>
    <div class="miniboard">
        <span id="miniboard"> :건</span>
    </div>
    
    </div>


    <h4 class="head">당일일괄복사(클릭)</h4>
    <table class="showtable" >
    <thead><td>순서번호</td><td>팀원명</td><td>인터넷</td><td>TV</td><td>Mobile</td><td>권유성공</td>
    <td>SR번호</td><td>삭제▽(클릭후 새로고침)</td>
    </thead>
    <?php 
    
    
    $td ="";
    $td1 ="";
    $sql = "SELECT * FROM sales_today";
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql);
 
    while($row = mysqli_fetch_array($result)){
        $td = $td.'<tr><td>'.$row['num'].'</td>'.'<td class="name">'.$row['teamname'].'</td>'
        .'<td>'.$row['internet'].'</td>'.'<td>'.$row['tv'].'</td>'.'<td>'.$row['mobile'].'</td>'
        .'<td>'.$row['success'].'</td>'.'<td>'.$row['sr'].'</td>'.'<td>'.'<form action='.'todaytotal.php'." ".'method='.'post'.'>'.
        '<input class="delsubmit" type=submit'." ".'name='.'delkey'." ".'value='.$row['num'].''.'>'.'</form>'.
        '</td>'.'</tr>';
    }

    while($row1 = mysqli_fetch_array($result1)){
        $td1 = $td1.'<tr><td>'.$row1['internet'].'</td>'.'<td>'.$row1['tv'].'</td>'.'<td>'.$row1['mobile'].'</td>'
        .'<td>'.$row1['success'].'</td>'.'<td>'.$row1['sr'].'</td>'.'</tr>';
    }
    
    echo $td;

    $user_delnum =$_POST['delkey'] ?? ''; 

    if(!empty($user_delnum)){
        $sqlDEL = "DELETE FROM sales_today WHERE num = $user_delnum"; 
        mysqli_query($conn,$sqlDEL);
        echo $user_delnum.'번이 삭제됐습니다.' ;
    }
    ?>
    </table>
    <table class="realtable">
        <?php 
        echo $td1;
        ?>
    </table>
   
    <script src="../java/library.js"></script>
    <script> 
    $('h4').click(function(){
        $('.realtable').css('opacity','1');
        $lib.rangecopy('.realtable');
        $('.realtable').css('opacity','0');
    })

    $('.delsubmit').click(function(){
        location.reload();
    })
  
    var namearray =[];
    $('.teamname').change(function(){
     var selval = $(this).val();
        $('.name').each(function(){
      var nametext =  $(this).text() ;

       if(selval == nametext){
         namearray.push(nametext);
         }
       }) //each문 끝
       $('#miniboard').text(namearray.length+':건');

       namearray.length = 0;

    })
   
</script>
</body>
</html>