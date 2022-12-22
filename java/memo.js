var textare_color = document.querySelectorAll('textarea') ; 
const clock = document.querySelector('.h1-clock');
const setTime = document.querySelector('.inputtime');

function getAlarm()
{  const setValue = setTime.value;  
const date = new Date();  
const hours = date.getHours();  
const minute = date.getMinutes();  
const current = `${hours < 10 ? `0${hours}` : hours}:${minute < 10 ? `0${minute}` : minute}`;
  

if(current == setValue)
{ textare_color[0].style.backgroundColor ='tomato';
textare_color[1].style.backgroundColor ='tomato';
}}

function getTime(){
const time = new Date();
const hour = time.getHours();
const minutes = time.getMinutes();
const seconds = time.getSeconds();
//clock.innerHTML = hour +":" + minutes + ":"+seconds;
clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}:${seconds<10 ? `0${seconds}`:seconds}`
}

function init(){
setInterval(getTime, 1000);
alarm = setInterval(getAlarm, 1000);
}
init();


//클릭후 특정범위내 글자 복사
window.onload = function () {
   const valOfDIV = document.querySelector("#btn1");

   valOfDIV.addEventListener("click", function () {
       const copyElement = document.querySelector('.h1-clock');
       copy(copyElement.innerHTML)
   })
}
  function copy (value) {
   navigator.clipboard.writeText(value);
  }
//글자수 카운트 함수 

String.prototype.bytes = function() {
 var str = this;
 var l = 0;
 for (var i=0; i<str.length; i++) l += (str.charCodeAt(i) > 128) ? 2 : 1;
 return l;
 }
 
 function cal_pre()
 {
 var textare_txt_count = document.querySelectorAll('textarea')
 var size_check = textare_txt_count[0].value;
 var size_check2= textare_txt_count[1].value;
 //var size_check = document.comment.value;
 document.form.size.value = size_check.bytes();
 //document.form.size1.value =size_check2.bytes();
 document.form.size1.value = size_check2.bytes();
 }

 //textarea 내용 지우기 함수 

 function erasertext1(){
  var textare_color = document.querySelectorAll('textarea') ;
  textare_color[0].value="";
  textare_color[1].value="";
    }
    
function erasertext2(){
  var textare_color = document.querySelectorAll('textarea') ;
  textare_color[1].value="";
    }  


let SRarray = 
{'통품SR기본양식':'★통품SR양식★\n■서비스 번호 :\n■민원인 :\n■연락처 :\n■증상 :\n■발생 시기 :\n■확인 및 안내사항 :\n#단말기 오류문구 :',
'개선여부확인TT':'★개선여부 확인 요청★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 : \n■HD보이스 설정방법 문자 전송여부(YES/NO) :\n■코로나 관련여부 확인 :\n■기타요청사항 :\n',
'설치 중계기 TT':'★중계기 시설요청 ★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 : \n■HD보이스 설정방법 문자 전송여부(YES/NO) :\n■코로나 관련여부 확인 :\n■기타요청사항 :\n',
'점검AS 중계기 TT':'★중계기 점검요청 ★\n■개통14일이내 여부 :N / Y\n  y일 경우 개통일자 : \n  개통단말 전산일치 : Y,N\n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■램프색 :\n■중계기 전원리셋여부 :\n■코로나 관련여부 확인 :\n■기타요청사항 :\n',
'이설TT  중계기 ':'★중계기 이설요청 ★\n■명의자 / 요청자\n■고객번호/비상연락처 :\n■현주소 :\n■이전할 주소 :\n■사유 :\n■코로나 관련여부 확인 :\n■기타요청사항 :',
'철거TT   중계기 ':'★중계기 철거요청 ★\n■접수자 :\n■고객번호/비상연락처 :\n■주소 :\n■사유 :\n■코로나 관련여부 확인 :\n■기타요청사항 :\n',
'비영업 불만양식':'[비영업]\n■접수번호 / 성함:\n■연락처 / 요청자:\n■불만내용:\n-\n■요구사항 :\n■귀책부서명 /코드 :',
'영업 VOC접수양식':'[영업]\n■접수번호 / 성함:\n■연락처/요청자/명의자와의 관계:\n■불만내용: 주요 불만 요약정리\n-\n■서식지 확인내용: ex.서식지 확인시 36개월이나 24개월로 안내받음 등\n■요구사항 :\n■귀책대리점명 /코드 :\n■대리점 기경유/긴급/접촉거부:',
'민원성 요금조정':'[민원성 요금조정 SR양식]\n■고객번호\n■청구계정번호 :\n■명의자:\n■납부방법 :\n■요청자 :\n■고객불만(언제/무엇을) :\n■금액산정 :\n■적용기간 및 처리금액 :\n■기타요청사항 :\n',
'권유[모바일판기발]':'[권유]\n1.업무처리 할 번호 /고객명 :\n2.약정만료 or 180일 이내 여부 :\n3.관심기종 : \n4.통화가능연락처 :\n5.특정사항 : \n6.관심도 상/중/하 :\n가입-가입권유-컨설팅요청-컨설팅요청(무선SMG)\n',
'KT   WIFI   이관':'[kt-wifi 문의 및 불만]\n■서비스 번호 /명의자 :\n■연락처 / 민원인 :\n■이용서비스 : \n코스개통상태 ,전용요금제 또는 부가서비스 확인\n■요청사항 :\n■부서명 : UCB0043',
'LTE EGG   TT':'[LTE Egg+ TT접수]\n■개통14일이내 여부 :\n■코로나 관련 여부 확인 :\n■서비스 번호 : \n■명의자 :\n■요청자 :\n■연락처 :\n■주소 :\n■신호 : 초록(강함) ,주황(보통) ,빨강(약함) 등\n■모델명 :\n■증상 : \n■지상위치 : (지하1층~2층 등)\n■건물유형 : (아파트 주택가 사무실 등)\n■개통일 :\n',
'장애공지양식':'1. 발신 :\n2. 장애일시 :\n3. 장애지역 :\n4. 현상(서비스영향) :\n5. 고객센터응대스크립트유형 :-\n6. 예상복구일시 :\n7. 담당자 :',
'장애공지댓글':'1. 컨택일시 : (시간까지 기재)\n2. 컨택포인트 : (확인한 담당자 성함+연락처)\n3. 확인내용 :' 
}
