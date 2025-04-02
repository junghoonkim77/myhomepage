<?php 
// 데이터베이스 정보를 배열로 설정
$databases = [
   'folkball.dothome.co.kr' => [
       'user' => 'folkball',
       'password' => 'amho73032721!',
       'dbname' => 'folkball'
   ],
   'localhost' => [
       'user' => 'root',
       'password' => 'amho73032721',
       'dbname' => 'abc_corp'
   ]
];

// 서버의 도메인 이름을 가져옴
$serverName = $_SERVER['SERVER_NAME'];

// 도메인 이름에 따라 데이터베이스 선택
if (array_key_exists($serverName, $databases)) {
   $selectedDB = $databases[$serverName];
} else {
   die("서버 설정에 맞는 데이터베이스 정보가 없습니다.");
}

// 선택된 데이터베이스에 대한 연결 시도
$conn = mysqli_connect('localhost', 
                      $selectedDB['user'], 
                      $selectedDB['password'], 
                      $selectedDB['dbname']);

// 연결 성공 여부 확인
if (!$conn) {
   die("연결 실패: " . mysqli_connect_error());
}

echo "DB_연결 성공";

 $sql = "SELECT * FROM chat_table";
 $result = $conn -> query($sql);
 $chatdata = array();
 if($result ->num_rows >0){
   while($row = $result->fetch_assoc()){
      $chatdata[$row["classname"]]=nl2br($row["classvalue"]);
   }
 }
 function remove_chars ($string){
   return preg_replace('/[\x00-\x1F\x7F]/u', '', $string);
 }

foreach ($chatdata as $key => $value) {
    $chatdata[$key] = remove_chars($value);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       
       body{
         height :100vh;
         width : 100vw;
         padding : 2rem;
       }
       .container{
            display:grid;
            height : 100%;
            width : 100%;
            grid-template-columns: 0.7fr 2fr  ;
            grid-template-rows: 65px auto ;
            grid-template-areas: 
             'a a'
             'nav main'
             'b b'
            ; 
        }
    header,nav,main,aside,footer,.menu{
        border : 1px solid gray;
        display : flex;
       /* align-items : center; */
        height : 100%;
        width : 100%;
    }
     header {
        grid-area : a;
        display :block;
     }    
     nav{
        grid-area :nav;
        display :flex;
        flex-wrap: wrap;
        font-size : 11px;
        }

    nav div {
      border : 1px solid gray;
      margin :0px;
      padding : 0px;
      background-color : white;
      
    }

    nav div pre{
       margin:0px;
    }

    main{
        padding : 0px;
        grid-area : main;
        display :flex;
        justify-content: flex-start;
        align-items: flex-start;
        align-content: flex-start;
        flex-wrap : wrap;
        
    } 
     main pre{
        display :inline-block;
        font-size : 10px;
        border : 2px solid gray;
        margin : 0px;
        
       /* flex-grow: 1; */
     }
     main pre:hover {
        background-color: aqua;
        
     }   
     
    </style>
   <script src="https://code.jquery.com/jquery-3.6.4.js" 
   integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" 
   integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" 
   crossorigin="anonymous"></script>
   
   

   <title>채팅상담</title>
</head>
<body>
    <div class="container">
      
          <header>
            <div class="head">
             <button class="button1"><a href="#">전체선택해제</a></button><br>
             <button class="navHide">메뉴줄이기</button>
            <input id="consulName" type="text" placeholder="사용전 본인 이름입력 필수">
            <button class="namePut">업무 시작전 1회 본인 성명 입력후 클릭</button>
            
            </div>        
         </header>
         
<nav>

<div class="srcheckbox" title="첫인사 /명의자 정보확인">
[첫인사 / 끝인사 /선종결 양해 ]
<pre>  
<label><input value="첫인사" type="checkbox" >첫인사</label>
<label><input value="대기첫인사" type="checkbox" >대기고객첫인사</label>
<label><input value="첫인사니즈파악" type="checkbox" >첫인사+무엇을도와드릴까요?</label>
<label><input value="끝인사" type="checkbox" >끝인사</label>
<label><input value="양해끝인사" type="checkbox" >불편양해 끝인사</label>
<label><input value="인증불가" type="checkbox" >로그인 /인증불가시 양해</label>
<label><input value="금옥선종결" type="checkbox" >선종결 (5분경과)</label>
<label><input value="미지원" type="checkbox" >채팅상담 미지원 양해</label>
<label><input value="타켓이관" type="checkbox" >타겟이관시 양해멘트</label>
<label><input value="타켓이관실패" type="checkbox" >타겟이관 실패시 양해멘트</label>
<label><input value="중식양해" type="checkbox" >중식 시간 SO요청시 양해멘트</label>
<label><input value="대기양해" type="checkbox" >전산 확인시 보류 양해멘트</label>
<label><input value="대기양해1" type="checkbox" >전산 확인시 확인이 늦어질때 양해멘트</label>
<label><input value="대기감사" type="checkbox" >전산 확인시 보류 양해멘트</label>
</pre>     
</div>            


<div class="srcheckbox" title="기술상담OB">
[기술상담 호응멘트 및 탐색사항]
<pre>
<label><input value="불편양해" type="checkbox" >불편양해 및 호응 (상담 서두)</label>
<label><input value="증상" type="checkbox" >발생중인 증상탐색</label>
<label><input value="언제부터" type="checkbox" >발생시기</label>
<label><input value="지역상관" type="checkbox" >지역상관여부</label>

</pre>
</div>

<div class="srcheckbox" title="기술TT">
[기술TT양식_채팅]
<pre>
<label><input value="신호점검요청" type="checkbox" >기술TT(신호점검요청)</label>
<label><input value="중계기설치" type="checkbox" >기술TT(중계기설치요청)</label>
<label><input value="중계기점검" type="checkbox" >기술TT(중계기 점검요청)</label>
<label><input value="중계기이설" type="checkbox" >기술TT(중계기 이설요청)</label>
<label><input value="중계기철거" type="checkbox" >기술TT(중계기 철거요청)</label>
<label><input value="TT시기" type="checkbox" >TT 시기탐색</label>
<label><input value="TT증상" type="checkbox" >TT 증상탐색</label>
<label><input value="TT중계기" type="checkbox" >TT발행시 중계기 설치여부 탐색</label>
<label><input value="TT연락처" type="checkbox" >TT발행시 비상 연락처 탐색</label>
<label><input value="TT공지" type="checkbox" >TT 공지국소 확인중 멘트</label>
<label><input value="TT공지1" type="checkbox" >TT 공지국소 확인후 접수진행 멘트</label>
<label><input value="TT완료멘트" type="checkbox" >TT완료후 마무리 멘트(TT문자는 별도발송)</label>
</pre>
</div>

<div class="srcheckbox" title="명의자 정보">
[명의자 정보 확인]
   <pre>

<label><input value="로그인요청" type="checkbox" >로그인 요청전 안내멘트</label>
<label><input value="본인여부" type="checkbox" >명의자 본인여부 확인</label>
<label><input value="대리인" type="checkbox" >대리인 인입시 확인</label>
<label><input value="주소동" type="checkbox" >주소 동과 번지 탐색</label>
<label><input value="아파트명" type="checkbox" >아파트 명과 동,호수 탐색</label>
<label><input value="주소동상세" type="checkbox" >주소의 00동 이하 상세주소</label>
<label><input value="인증완료" type="checkbox" >정보 인증완료후 감사멘트</label>

   </pre>
</div>

<div class="srcheckbox" title="채팅 상담 요약SR">
<pre>
<label><input value="채팅요약" type="checkbox" >채팅상담 간단이력양식</label>
</pre>
</div>

<div class="srcheckbox" title="금옥누님 채팅SR모음">
<pre>

</pre>
</div>


</nav>


<main>

</main>
          
    </div>
    <script src="../../java/library.js"></script>
    <script>
        jQuery(function(){
         const $chatname = localStorage.getItem('chatName');
         const $content = JSON.parse('<?php echo json_encode($chatdata,JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);?>');
         console.log($content);
    for ( key in $content){
      $content[key] = $content[key].replace("${$chatname}",$chatname);
    } 
 

            var $inputTotal = $('.container label input[type=checkbox]');
            var $mainPre = $('.container main pre');
            $inputTotal.click(function(){
                var $index = $(this).index('.container label input');
                var $val = $(this).val();
             //  $(this).prop("checked", !$(this).prop("checked")); 
                var propis = $(this).prop('checked');
              
             if(propis){ $('main').append(`<pre id=${$val} ></pre>`)
             for ( key in $content){
                 $('#'+key).html($content[key]);
               }
               var $main = $('main pre'); 
               $main.draggable();
            }else{ $('#'+$val).remove();}
            })
            
            $('html').on("click","main pre",(function(){
               var pretext = "#"+$(this).attr('id');
               console.log(pretext);
                $lib.rangecopy(pretext);
               //$lib.copyall(pretext);
            }));


            $('.button1').click(function(){
               $inputTotal.each(function(){
                  $(this).prop('checked',false);
                  var $val = $(this).val();
                  $('#'+$val).hide();
                       
               })
            })
           
            
           $( "nav" ).sortable();
           $( "nav" ).disableSelection();
           
        
         $('.namePut').on('click',function(){
          localStorage.setItem('chatName',$('#consulName').val()) ;
          location.reload();
         })     
         
         $('.navHide').click(function(){
            $(this).toggleClass('navview');
            if($(this).hasClass('navview')){
               $('.container').css('grid-template-columns','0.1fr 2fr')
               $('.navHide').text('메뉴펼치기')
            }else{
               $('.container').css('grid-template-columns','0.7fr 2fr')
               $('.navHide').text('메뉴줄이기')
            };
         })
                   
            
            
       }) // 맨 마지막 블럭
        
      
       
    </script>
</body>
</html>
