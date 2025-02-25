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
      $chatdata[$row["classname"]]=$row["classvalue"];
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
        font-size : 12px;
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
  
    for ( key in $content){
      $content[key] = $content[key].replace("${$chatname}",$chatname);
    } 
 
 
/*const $content ={
"첫인사":         
`반갑습니다. KT 통화품질 채팅 상담사 ${$chatname} 입니다.`,
         
"대기첫인사":
`기다려주신 만큼 신속하게 도움드리겠습니다.KT 채팅 상담사 ${$chatname} 입니다.`,
         
"첫인사니즈파악":
`반갑습니다. KT 통화품질 채팅 상담사 ${$chatname} 입니다. 무엇을 도와드릴까요?`,
         
"끝인사":
`다음에 또 궁금한 점이 있으실 때 언제든 연락주시면 
최선을 다해 도움 드리겠습니다.상담사 ${$chatname} 입니다.`,
         
"양해끝인사":
`이용에 불편을 드려 죄송합니다. ${$chatname} 입니다.`,
         
"불편양해":
`아 그러세요.이용에 불편드려 죄송합니다.바로 확인해보겠습니다.`,

"증상":
`어떤 증상이 발생되고 있는지 말씀해주시겠습니까?`,

"언제부터":
`언제부터 말씀하신 증상이 발생되고 있습니까?`,

"지역상관":
`말씀하신 증상은 특정장소(EX.자택 혹은 사무실 등)에서만 혹은 지역과 
상관없이 장소이동하셔도 발생되는 상황인지 알수 있을까요?`,

"신호점검요청":
`
[채팅]
★개선여부 확인 요청★
■개통14일이내 여부 :N / Y
y일 경우 개통일자 :
개통단말 전산일치 : Y,N 
■명의자/요청자 :
■고객번호/비상연락처 :
■발생주소 :
■발생증상 :
■발생시기 :
■중계기 유/무 :
■모델명 : 
■요금제 :
■장애공지 확인여부 : Y
■KT인터넷 가입여부(Y/N)/회선속도 :
■최대5년 대외기관 접수이력(Y/N):N
■기타요청사항 :
`,
"중계기설치":
`
[채팅]
★중계기 설치 요청★
■개통14일이내 여부 :N / Y
y일 경우 개통일자 :
개통단말 전산일치 : Y,N 
■명의자/요청자 :
■고객번호/비상연락처 :
■발생주소 :
■발생증상 :
■발생시기 :
■중계기 유/무 :
■모델명 : 
■요금제 :
■장애공지 확인여부 : Y
■KT인터넷 가입여부(Y/N)/회선속도 :
■최대5년 대외기관 접수이력(Y/N):N
■기타요청사항 :
`,
"중계기점검":
`
[채팅]
★중계기 점검요청 ★
■개통14일이내 여부 :N / Y
y일 경우 개통일자 :
개통단말 전산일치 : Y,N 
■명의자/요청자 :
■고객번호/비상연락처 :
■발생주소 :
■발생증상 :
■발생시기 :
■중계기 유/무 :
■램프색상/리셋여부 :
■모델명 : 
■요금제 :
■장애공지 확인여부 : Y
■KT인터넷 가입여부(Y/N)/회선속도 :
■최대5년 대외기관 접수이력(Y/N):N
■기타요청사항 :

`,

"중계기이설":
`
[채팅]
★중계기 이설요청 ★
■명의자 / 요청자
■고객번호/비상연락처 :
■현주소 :
■이전할 주소 :
■사유 :
■기타요청사항 :
`,

"중계기철거":
`
[채팅]
★중계기 철거요청 ★
■접수자 :
■고객번호/비상연락처 :
■주소 :
■사유 :
■기타요청사항 :
`,
"본인여부":
`명의자분 본인이신가요?`,

"대리인":
`채팅 주신 대리인분의 성합을 입력 부탁드립니다.`,

"주소동":
`등록되어 있는 주소의 동과 번지를 입력해 주시겠습니까?`,

"아파트명":
`등록되어있는 주소의 아파트명과 동, 호수를 입력해 주시겠습니까?`,

"주소동상세":
`등록되어있는 주소의 OO동 이하 상세주소를 입력해 주시겠습니까?`,

"인증완료":
`고객님의 소중한 정보 확인해 주셔서 감사합니다.`,

"TT완료멘트":
`접수 후 담당부서에서 순차적으로 전화 또는 문자로 연락드릴 예정이며, 
필요 시 담당자가 현장 방문하여 테스트 진행 후 적절한 조치를 취해 
드리도록 하겠습니다.`,

"인증불가":
`안타깝게도 채팅 상담은 KT ID 로그인/PASS 인증 후 상담이 가능합니다.
kt 고객센터로 연락주시면 빠른 상담도와드리겠습니다.

※ 평일 09시~18시 (점심시간 12~13시 제외)
☎ KT 고객센터 : 114,100 (KT폰에서 무료), 1588-0010 (유료) [복사]`,

"채팅요약":
`
[K-ACE 상담요약 양식]
■요청자 : 
■문의내용 : 
 
■ 처리내용 :
`,
"로그인요청":
`상담을 위해 번거로우시겠지만 고객님의 정보 확인먼저 진행하겠습니다.`,

"금옥선종결":
`고객님, 오랫동안 말씀이 없으셔서 5분 뒤에 상담이 자동 종료 될 예정입니다.
대기중인 다음 고객님과의 상담을 위해 양해부탁드립니다. ${$chatname} 입니다. `,

"미지원":
`■ 채팅상담 미지원 양해
이용에 불편을 드려 죄송합니다. 
문의하시는 내용은 채팅상담이 불가합니다.
평일 업무시간에 채팅상담 또는 kt 고객센터로 
연락주시면 빠른 업무처리 도와드리겠습니다.
☎ KT 고객센터 : 114, 100 (KT폰에서 무료),
1588-0010 (유료)
※ 평일 09시~18시 (점심시간 12~13시 제외)
`,

"타켓이관":
`안타깝게도 문의주신 내용은 상담 가능한 부서가 
별도로 있어 바로 연결해 드리겠습니다.
잠시만 기다려 주시겠습니까?`,

"타켓이관실패":
`이용에 불편을 드려 죄송합니다.
현재 모든 상담사가 응대중이라 연결이 어렵습니다.
kt 고객센터로 연락주시면 빠른 업무처리 도와드리겠습니다.

※ 평일 09시~18시 (점심시간 12~13시 제외)
☎ KT 고객센터 : 114,100 (KT폰에서 무료), 1588-0010 (유료)`,

"중식양해":
`이용에 불편을 드려 죄송합니다.
지금은 점심시간(12시~13시)이라 청구금액, 요금제 등 
일반 채팅상담이 어렵습니다.
13시 이후 핸드폰 일반상담부서로 재문의 주시거나 
kt 고객센터로 전화연락주시면 빠른 업무처리 도와드리겠습니다.

☎ KT 고객센터 : 114, 100 (KT폰에서 무료),1588-0010 (유료)
※ 평일 09시~18시 (점심시간 12~13시 제외)
`,

"대기양해":
`신속하게 확인중에 있습니다.잠시만 기다려주시겠습니까?`,

"대기감사":
`기다려 주셔서 감사합니다.`,

"대기양해1":
`확인하는데 시간이 소요되고 있습니다. 
잠시만 더 기다려주시겠습니까?`,

"TT시기":
`말씀하신 증상은 언제부터 발생중입니까?`,

"TT증상":
`증상이 어떤지 입력해주시겠습니까?
 (예: 음성 수발신 불가, 통화중 음 끊김, 
 데이터 접속불가, 데이터 속도지연 등)`,

"TT중계기":
`통화가 불편한 장소에 핸드폰 신호 개선을 위한 
중계기가 설치돼 있습니까?`,

"TT공지":
`말씀하신 주소지 일대 특이사항이나 공지된 내용이 있는지 확인중에 있습니다.
잠시만 기다려주시겠습니까?`,

"TT연락처":
`연락이 안될경우 통화가능한 비상연락처를 말씀해주시겠습니까?
비상 연락처가 없으시면 현재 접수중인 번호로 연락 드릴겁니다.`,



} */


            var $inputTotal = $('.container label input[type=checkbox]');
            var $mainPre = $('.container main pre');
            $inputTotal.click(function(){
                var $index = $(this).index('.container label input');
                var $val = $(this).val();
             //  $(this).prop("checked", !$(this).prop("checked")); 
                var propis = $(this).prop('checked');
              
             if(propis){ $('main').append(`<pre class=${$val} ></pre>`)
             for ( key in $content){
                 $('.'+key).text($content[key]);
               }
               var $main = $('main pre'); 
               $main.draggable();
            }else{ $('.'+$val).remove();}
            })
            
            $('html').on("click","main pre",(function(){
               var pretext = $(this).text();
               $lib.copyall(pretext);
            }));


            $('.button1').click(function(){
               $inputTotal.each(function(){
                  $(this).prop('checked',false);
                  var $val = $(this).val();
                  $('.'+$val).hide();
                       
               })
            })

           // $( ".srcheckbox" ).draggable();
            
           $( "nav" ).sortable();
           $( "nav" ).disableSelection();
           
             //$main.draggable();
         
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
