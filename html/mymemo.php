<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/mymemo.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js" 
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
             
        <title>메모장</title>
    </head>
    <body>
      <div class="alarmpop">
        <button title="클릭하면 복사와 창닫기 동시수행" class="xbutton">✖</button>
    </div>   
  <button class="butttonshow">버튼보이기</button>
 <select name="person" id="teamperson">
   <option  value="" >전산명▼</option>
   <option  value="meid">본인ID(kos id)</option>
   <option  value="kos">KOS비번</option>
   <option  value="atas">ATAS비번</option>
   <option  value="idms">IM메신저비번</option>
   <option  value="wfms">wfms비번</option>
 </select>
 <button title="전산명선택->비번메모장입력->비번변경클릭 끝" 

   class="leftmove11 drag">비번변경</button>
 
 <button title="모두지우기" class="del drag">모두지우기</button>

 <h5 style="cursor:pointer"  class="drag">현재 시간☞<strong class = "h1-clock" ></strong> <span style="font-size : 7px;" id="memosuccess"></span> </h5>
 <input id="masking" style="background-color: beige; cursor:pointer" title="개인알림용 번호처리"  type="text" autocomplete="off" placeholder="-없이 입력 -> CTRL+V">
 <span id="memoview">M</span>
 <div class="buttonpack">

   <input class="leftmove5" type="button" value="그룹📧"

       onclick="window.open('https://gw.ktcs.co.kr/logon.aspx', '_blank', 'width=1100, height=900' ) ; return false;">

       <div class="task_gate drag">

         <button class="schedule">비번코드</button>

         <div class="task_gate1 font-size">

   <input data-code="UCB0041" class="common"type="button" value="서울통품1팀[UCB0041]" ><br>

   <input data-code="UCB0043"class="common"type="button" value="서울기스마[UCB0043]"><br>

   <input data-code="UCB0071"class="common" type="button" value="서울고만[UCB0071]"> <br> 

   <input data-code="UCK0033"class="common"type="button" value="대전통품[UCK0033]" > <br>

   <input data-code="UCL0053"class="common"type="button" value="대구통품[UCL0053]" ><br>

   <input data-code="KRater OP" class="common"type="button" value="KRater OP"> <br>

   <input data-code="ktcs1234##" class="common" type="button" value="넷윈도등비번(공통)"> <br>

   <input data-code="meid" class="special" type="button" value="본인ID(kosid)" >  <br>

   <input data-code="kos" class="special" type="button" value="KOS비번"><br>

   <input data-code="atas" class="special" type="button" value="ATAS비번"> <br>

   <input data-code="idms" class="special" type="button" value="IM메신저비번"><br>

   <input data-code="wfms" class="special" type="button" value="WFMS비번">  <br>

         </div>

       </div>   

   <button class="leftmove9">메모저장💾</button>

   <button class="leftmove10"> <a href="localstrageout.html" onclick="vocbank('localstrageout.html','600'); 

    return false;">메모목록</a> </button>

    

   <input class="leftmove4" type="button" onclick="sample6_execDaumPostcode()" value="주소">

   <input class="leftmove3" id="toggle1" type="button"  value="📘📘" >

   <input class="leftmove1" id ="toggle" type="reset" value="맞춤법" >

   <button id ="btn1">🕑복사</button> 

   

   <div class="dropdown leftmove2 drag" >
       <span class="dropbtn">SR양식</span>
       <div class="dropdown-content">
         <input class="srform" type="button" value="통품SR기본양식" 
        onclick="copy(SRarray[this.value])">
        <input class="srform" type="button" value="개선여부확인TT" 
        onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="설치 중계기 TT" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="점검AS 중계기 TT" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="이설TT  중계기 " 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="철거TT   중계기 " 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="비영업 불만양식"
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="비영업 대외민원말머리" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="영업 VOC접수양식" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="민원성 요금조정" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="권유[모바일판기발]" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="KT   WIFI   이관" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="LTE EGG   TT" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="장애공지양식" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="장애공지댓글" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="시설사_재이관" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="광주전남제주 voc" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="대전충남 VOC"
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="충북 voc" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="대구,포항 voc" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="부산,경남,울산 voc" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="제주센터 고만코드" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="KTIS군포고만" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="KTIS삼송고만" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="KTIS광화문" 
         onclick="copy(SRarray[this.value])">
         <input class="srform" type="button" value="KTIS원주(강원도)" 
         onclick="copy(SRarray[this.value])">
         
       </div>

     </div>
     <div title="눈이피로할때" class="leftmove12 drag"><a href="#">야간</a></div>
     <div title="버튼감춤" class="buthidden drag"><a href="#">버튼감춤</a></div>

   <!--<input class='inputtime' type='time' min='00:00' max='23:59'/> -->
   <div class="dropdown-alarmGate" >
    <span class="alarm-gateName">멀티알람설정</span>
    <div class="alarm-list" style="display:none" >
      <div>
        <input class='inputtime' id="inputtime0"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime1"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime2"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime3"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime4"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime5"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime6"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime7"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime8"  type='time' min='08:00' max='19:59'/>
                <input class='inputtime' id="inputtime9"  type='time' min='08:00' max='19:59'/>
       </div>
       <div>
                <input type="text" class="alarm_memo" id="alarm_memo0" placeholder="1.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo1" placeholder="2.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo2" placeholder="3.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo3" placeholder="4.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo4" placeholder="5.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo5" placeholder="6.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo6" placeholder="7.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo7" placeholder="8.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo8" placeholder="9.알람메모">
                <input type="text" class="alarm_memo" id="alarm_memo9" placeholder="10.알람메모">
       </div> 
           
    </div>
  </div>
     <select  style="width:40px;" id="newTimer">
            <option value="">⏲️선택</option> 
            <option value="1">1분</option>
            <option value="2">2분</option>
            <option value="3">3분</option>
            <option value="4">4분</option>
            <option value="5">5분</option>
            <option value="6">6분</option>
            <option value="7">7분</option>
            <option value="8">8분</option>
            <option value="9">9분</option>
            <option value="10">10분</option>
            <option value="15">15분</option>
            <option value="20">20분</option>
            <option value="25">25분</option>
            <option value="30">30분</option>
            <option value="35">35분</option>
            <option value="40">40분</option>
            <option value="60">60분</option>
           </select>


   <input id="musthidden" style=width:50px type='text' name='size' value='' readonly placeholder="1.2000">
   <input id="dailysaver" style=width:50px type='text' name='size1' value='' readonly placeholder="2.2000">
   <button class="salescount1">가설</button>

     <div class="dropdown leftmove8 drag" >
       <span class="dropbtn1">일과</span>
       <div class="dropdown-content1"></div>
     </div>
</div>   

     <div class="textarea_container">
      <form  id="memosavebut" name="memosavebut">
     <textarea style="font-size: 11px;font-weight: bold;" class="must" id="must" title="꼭할일&더블클릭" cols="35" rows="20"></textarea>
      
      <textarea name="texAreamemo1" class="delText" id="alarmText" title="비밀번호셋팅창" cols="40" rows="37" onKeyUP="javascript:cal_pre();"></textarea> 
     <textarea class="delText" id="hidden1" cols="40" rows="37" onKeyUP="javascript:cal_pre();"></textarea> 
     </form>
     
   </div>
    
    <script>
      function sample6_execDaumPostcode() {
          new daum.Postcode({
              oncomplete: function(data) {
                  // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
  
                  // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                  // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                  var addr = ''; // 주소 변수
                  var extraAddr = ''; // 참고항목 변수
  
                  //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                  if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                      addr = data.roadAddress;
                  } else { // 사용자가 지번 주소를 선택했을 경우(J)
                      addr = data.jibunAddress;
                  }
  
                  // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                  if(data.userSelectedType === 'R'){
                      // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                      // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                      if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                          extraAddr += data.bname;
                      }
                      // 건물명이 있고, 공동주택일 경우 추가한다.
                      if(data.buildingName !== '' && data.apartment === 'Y'){
                          extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                      }
                      // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                      if(extraAddr !== ''){
                          extraAddr = ' (' + extraAddr + ')';
                      }
                      // 조합된 참고항목을 해당 필드에 넣는다.
                      document.getElementById("sample6_extraAddress").value = extraAddr;
                  
                  } else {
                      document.getElementById("sample6_extraAddress").value = '';
                  }
  
                  // 우편번호와 주소 정보를 해당 필드에 넣는다.
                  document.getElementById('sample6_postcode').value = data.zonecode;
                  document.getElementById("sample6_address").value = addr;
                  // 커서를 상세주소 필드로 이동한다.
                  document.getElementById("sample6_detailAddress").focus();
              }
          }).open();
      }
      
  </script>
  <script src="../java/memo.js"></script>
  <script src="../java/library.js"></script>
  <script src="../java/voc_bank.js"></script>
  <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script>
   jQuery(function(){
    
    var height = $('.buttonpack').offset()
    console.log(height.top);
  })

  </script>
  </body>
</html>
