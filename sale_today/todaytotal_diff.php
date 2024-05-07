<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .showtable td{
           border : 1px solid gray;
           font-size: 11px;
        }
        .realtable{
            opacity : 0;
            font-size: 14px;
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
     
        .back{
            margin-bottom:20px;
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
    echo "<a class=\"alldel\" href=\"alldel.php\">&nbsp&nbsp&nbsp&nbsp취합자 외 클릭 금지</a>";
    echo "<input id=\"edit\" type=\"checkbox\">";
    echo "<br><br>"
    ?>
    
    <button class="back"><a  href="index.html">입력창 복귀</a></button>
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
   <div class="totalsum">
    <mark><span class="totaltry"></span></mark><br>
    <span id="miniboard"> :건</span>
    </div>
    
    
    </div>
    

    <h4 class="head">당일일괄복사(클릭)</h4>
    <table class="showtable" >
    <thead><td>순서번호</td><td>팀원명</td><td>차별화SR 번호</td><td>말머리</td><td>삭제필요시 클릭</td>
    </thead>
    <?php 
    
    
    $td ="";
    $td1 ="";
    $sql = "SELECT * FROM difference";
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql);
 
    while($row = mysqli_fetch_array($result)){
        $td = $td.'<tr class="'.$row['teamname'].' namesort"><td>'.$row['num'].'</td>'.'<td class="name">'.$row['teamname'].'</td>'
        .'<td>'.$row['sr'].'</td>'.'<td>'.$row['srhead'].'<form action='.'todaysaleDel_diff.php'." ".'method='.'post'.'>'.
        '<input class="delsubmit" type=submit'." ".'name='.'delkey'." ".'value='.$row['num'].''.'>'.'</form>'.
        '</td>'.'</tr>';
    }

    while($row1 = mysqli_fetch_array($result1)){
        $td1 = $td1.'<tr><td>'.$row1['teamname'].'</td>'.'<td>'.$row1['sr'].'</td>'.'<td>'.$row1['srhead'].'</td>'
        .'</tr>';
    }
    
    echo $td;


    ?>
    </table>
    <table class="realtable">
        <?php 
        echo $td1;
        ?>
    </table>
   
    <script src="../java/library.js"></script>
    <script> 
   var $outname = localStorage.getItem('SaleOpName');
   $('#select').val($outname).prop('selected',true);
   var sortsum = 0 ;
   var namearray2 =[];
   //열자마자 sort된 화면으로 표시하기
   $('.showtable tr td:nth-child(2)').each(function(){
        if ($(this).text()===$outname){
            sortsum += parseInt($(this).siblings("td:nth-child(6)").text());
          //  $(this).siblings().css('background-color','skyblue');
          namearray2.push($(this).text());
          $('.namesort').show();
          $('.namesort').not('.'+$outname).hide();
          }else if($outname === ""){
            $('.namesort').show();
          }
    }) // 로컬값을 추출해 반복문으로 돌리고 고정값으로 표시해준다
    $('#miniboard').text($outname+': '+'시도 '+namearray2.length+':건'+'/ 권유 :'+sortsum+' 건');
    namearray2.length = 0;

    $('h4').click(function(){
        $('.realtable').css('opacity','1');
        $lib.rangecopy('.realtable');
        $('.realtable').css('opacity','0');
    })

    // 이름을 선택했을때 나오는 
    var namearray =[];
    $('.teamname').change(function(){
     // $('.showtable tr td').css('background-color','transparent')  
     // localstorage에 value값 넣기
       
     var selval = $(this).val();
     localStorage.setItem('SaleOpName',selval);
     var sum = 0 ;
        $('.name').each(function(){
      var nametext =  $(this).text() ;

       if(selval == nametext){
         namearray.push(nametext);
         }
       }) //첫번째 each문 끝
       
      
    $('.showtable tr td:nth-child(2)').each(function(){
        if ($(this).text()===selval){
            sum += parseInt($(this).siblings("td:nth-child(6)").text());
          //  $(this).siblings().css('background-color','skyblue');
          $('.namesort').show();
          $('.namesort').not('.'+selval).hide();
          }else if(selval === ""){
            $('.namesort').show();
          }
    }) //두번째 each문 끝 



    $('#miniboard').text(selval+': '+'시도 '+namearray.length+':건'+'/ 권유 :'+sum+' 건');
    namearray.length = 0;

    }) //change이벤트 끝 
   
    //초기화 방지 코드
     $(".alldel").click(function(e){
           const $editcheck = $('#edit').prop('checked');
            if(!$editcheck){
                e.preventDefault();
            }
     });

    
    // 초기화 체크박스 클릭스 경고문구
     $('#edit').click(function(){
       var opt = $(this).prop('checked');
       if (opt){
        $('.alldel').text('초기화 클릭');
       }else{
        $('.alldel').text('취합자 외 클릭 금지');
       }
      })

    //전체창에 총 시도건수 권유성공건수 모바일 성공건수 포함하기
     
    var succount  = 0 ;
     $('.totaltry').text('총 시도건수 :'+ $('.namesort').length ) ;
    
     $('.succount').each(function(){
       succount += parseInt($(this).text()) ;
      })
      $('.totalok').text('   /권유성공 :'+succount);

     
      // 모바일 성공건수 카운트  
      var $mobilesum = 0 
      $('.showtable tr td:nth-child(5)').each(function(){
        if ($(this).text()==='1'){
            $mobilesum += parseInt($(this).siblings("td:nth-child(6)").text());
         
          }
    }) //두번째 each문 끝  
    
      $('.mobile').text('  /모바일 이관건수:'+$mobilesum);

      //중복값 찾아내기 
      
      var $sr = $('.sr');
      function findduple(arr){
        var firstArr =[];
        arr.each(function(idx,el){
          firstArr.push(($(this).text()));
        })
        
       var sorted_arr = firstArr.slice().sort();
        //배열의 복사본을 만든다.
        var dupl_result =[];
        $.each(sorted_arr,function(idx,el){
            if(sorted_arr[idx+1]=== el){
                dupl_result.push(el);
            }

        });
        return dupl_result 
      }
     var test =  findduple($sr);
     console.log(test);
      
</script>
</body>
</html>