//알람 시간이 되면 색깔을 변경하기
/*if(current == setValue)
{ textare_color[0].style.backgroundColor ='tomato';
textare_color[1].style.backgroundColor ='tomato';
}} */
// 알람시간이 되면 알람창이 팝업되고 전체 색깔을 바꾸는 코드

var textare_color = document.querySelectorAll('textarea') ; 
const clock = document.querySelector('.h1-clock');


// 알람시간 입력하고 포인트 벗어나면 할일들 

//var $alarm_list = $('.alarm-list ol li > input');

var $alarmobject ={};
var $alarm_list = $('.inputtime')
$alarm_list.blur(function(){
  var timeVal = $(this).val();
  var timeValidx = $(this).index();
  var $alarmKey = $(this).attr('class')+timeValidx
  localStorage.setItem($alarmKey ,timeVal );
 
  })
 
 $.each(localStorage,function(key,val){
  if(key.slice(0,9)=="inputtime"){
    $(`#${key}`).val(val);
  }
 })
//알람메모 저장하기 

const alarm_memo ={'alarm_memo0':'.','alarm_memo1':'.','alarm_memo2':'.','alarm_memo3':'.'
  ,'alarm_memo4':'.','alarm_memo5':'.','alarm_memo6':'.','alarm_memo7':'.','alarm_memo8':'.'
  ,'alarm_memo9':'.'}
$('.alarm_memo').blur(function(){
 const alarmKey = $(this).attr('id'); 
 const alarm_memoVal = $(this).val();
 alarm_memo[alarmKey]=alarm_memoVal
 const $alarm_memo = JSON.stringify(alarm_memo);
 localStorage.setItem('alarmMemo',$alarm_memo);
})
// const $alarm_memo1 =JSON.parse(localStorage.getItem('alarmMemo'))
 

//알람 시간 맞추기  
  
function getAlarm()
{  const $alarm_memo1 =JSON.parse(localStorage.getItem('alarmMemo'))
const $setTime1 = $('#inputtime0');
const $setTime2 = $('#inputtime1');
const $setTime3 = $('#inputtime2');
const $setTime4 = $('#inputtime3');
const $setTime5 = $('#inputtime4');
const $setTime6 = $('#inputtime5');
const $setTime7 = $('#inputtime6');
const $setTime8 = $('#inputtime7');
const $setTime9 = $('#inputtime8');
const $setTime10 = $('#inputtime9');


const setTime1 = $setTime1.val();
const setTime2 = $setTime2.val();
const setTime3 = $setTime3.val();
const setTime4 = $setTime4.val();
const setTime5 = $setTime5.val();
const setTime6 = $setTime6.val();
const setTime7 = $setTime7.val();
const setTime8 = $setTime8.val();
const setTime9 = $setTime9.val();
const setTime10 = $setTime10.val();

const date = new Date();  
const hours = date.getHours();  
const minute = date.getMinutes();  
const current = `${hours < 10 ? `0${hours}` : hours}:${minute < 10 ? `0${minute}` : minute}`;
const cond1 = current == setTime1;
const cond2 = current == setTime2;
const cond3 = current == setTime3;
const cond4 = current == setTime4;
const cond5 = current == setTime5;
const cond6 = current == setTime6;
const cond7 = current == setTime7;
const cond8 = current == setTime8;
const cond9 = current == setTime9;
const cond10 = current == setTime10;
const conditions = [cond1, cond2, cond3, cond4, cond5, cond6, cond7, cond8, cond9, cond10];
const names = {0: "inputtime0", 1: "inputtime1", 2: "inputtime2", 3: "inputtime3"
  , 4: "inputtime4", 5: "inputtime5", 6: "inputtime6", 7: "inputtime7", 8: "inputtime8"
  , 9: "inputtime9"
}
const names1 = {0: "alarm_memo0", 1: "alarm_memo1", 2: "alarm_memo2", 3: "alarm_memo3"
  , 4: "alarm_memo4", 5: "alarm_memo5", 6: "alarm_memo6", 7: "alarm_memo7", 8: "alarm_memo8"
  , 9: "alarm_memo9" }
// 시간이 맞으면 로컬스토리지 값과 시간 밸류를 지움 
for (let i=0; i<conditions.length; i++){
  if(conditions[i]){
    
    $('body').css('background-color','tomato');
    $('.alarmpop').addClass('alrmblink');
    console.log(i);
    console.log(names1[i]);
   // console.log($alarm_memo1[names1[i]])
   $('.alarmpop pre').remove()
    $('.alarmpop').append(`<pre>${$alarm_memo1[names1[i]]}</pre>`)
    $(`#${names[i]}`).val(""); 
    localStorage.removeItem(names[i]);
   }
  } //바로 위에 for문
 } //getAlarm 함수끝임

   const memoDisplay= JSON.parse(localStorage.getItem('alarmMemo'))
   var meidx = 0
   for ( $k in memoDisplay){
    $('#alarm_memo'+meidx).val(memoDisplay[$k]);
    meidx++
   }


$('.xbutton').click(function(){
  if(navigator.clipboard){
    $lib.clipcopy($('.alarmpop pre').text());
  } else{
    $lib.clipcopy2($('.alarmpop pre').text());
  }
  $('.alarmpop').removeClass('alrmblink');
  $('body').css('background-color','transparent');
  $('#newTimer').val('');
  $('.alarmpop span').remove();
  $('#newTimer').css({
    'background-color':'transparent',
    "transition" : `transform 1000ms ease`,
    'transform' :'rotate(0deg)'  
  });
  localStorage.removeItem('timerNumval');
  clearTimeout(timerid);

  
})


function getTime(){
const time = new Date();
const $month = time.getMonth()+1;
const $year  = time.getFullYear();
const $day = time.getDate();
const hour = time.getHours();
const minutes = time.getMinutes();
const seconds = time.getSeconds();
//clock.innerHTML = hour +":" + minutes + ":"+seconds;
//clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}:${seconds<10 ? `0${seconds}`:seconds}`;
clock.innerHTML = '('+$year+'/'+$month+'/'+$day+')  '+`${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}`;
}


function init(){
setInterval(getTime, 1000);
alarm = setInterval(getAlarm, 1000);
}
init();

//멀티 알람정보 입력창 toggle 메소드 적용
$('.alarm-gateName').on('click',function(){
  $('.alarm-list').toggle();
})



//클릭후 특정범위내 글자 복사
window.onload = function () {
  getTime();
   const valOfDIV = document.querySelector("#btn1");
   valOfDIV.addEventListener("click", function () {
       const copyElement = document.querySelector('.h1-clock');
       if(navigator.clipboard){
        $lib.clipcopy(copyElement.innerHTML);
      } else{
        $lib.clipcopy2(copyElement.innerHTML);
      }
       
   })
}

/*  function copy (value) {
   navigator.clipboard.writeText(value);
  }  */

   function copy (value) {
    if(navigator.clipboard){
      $lib.clipcopy(value);
    } else{
      $lib.clipcopy2(value);
    }
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
 var textare_txt_count = document.getElementsByClassName('delText');
 var size_check = textare_txt_count[0].value;
 var size_check2= textare_txt_count[1].value;
 //var size_check = document.comment.value;

$('#musthidden').val(size_check.bytes())
$('#dailysaver').val(size_check2.bytes())
// document.form.size.value = size_check.bytes();
// document.form.size1.value = size_check2.bytes();
 

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


const ban = ``;
let SRarray = 
{'통품SR기본양식':`${ban}\n★통품SR양식★\n■서비스 번호 :\n■민원인 :\n■연락처 :\n■증상 :\n■발생 시기 :\n■확인 및 안내사항 :\n#단말기 오류문구 :`,
'개선여부확인TT':`${ban}\n★개선여부 확인 요청★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 :\n■장애공지 확인여부 : Y\n■KT인터넷 가입여부(Y/N)/회선속도& 인터넷 접속번호 :\n■최대5년 대외기관 접수이력(Y/N):N\n■기타요청사항 :\n`,
'설치 중계기 TT':`${ban}\n★중계기 설치요청 ★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 :\n■장애공지 확인여부 : Y\n■KT인터넷 가입여부(Y/N)/회선속도& 인터넷 접속번호 :\n■최대5년 대외기관 접수이력(Y/N):N\n■기타요청사항 :\n`,
'점검AS 중계기 TT':`${ban}\n★중계기 점검요청 ★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■램프색상/리셋여부 :\n■모델명 : \n■요금제 :\n■장애공지 확인여부 : Y\n■KT인터넷 가입여부(Y/N)/회선속도& 인터넷 접속번호 :\n■최대5년 대외기관 접수이력(Y/N):N\n■기타요청사항 :\n`,
'이설TT  중계기 ':`${ban}\n★중계기 이설요청 ★\n■명의자 / 요청자\n■고객번호/비상연락처 :\n■현주소 :\n■이전할 주소 :\n■사유 :\n■기타요청사항 :`,
'철거TT   중계기 ':`${ban}\n★중계기 철거요청 ★\n■접수자 :\n■고객번호/비상연락처 :\n■주소 :\n■사유 :\n■기타요청사항 :\n`,
'비영업 불만양식':`[비영업]\n■접수번호 / 성함:\n■연락처 / 요청자:\n■불만내용:\n-\n■요구사항 :\n■귀책부서명 /코드 :`,
'영업 VOC접수양식':`[영업]\n■접수번호 / 성함:\n■연락처/요청자/명의자와의 관계:\n■불만내용: 주요 불만 요약정리\n-\n■서식지 확인내용: ex.서식지 확인시 36개월이나 24개월로 안내받음 등\n■요구사항 :\n■귀책대리점명 /코드 :\n■대리점 기경유/긴급/접촉거부:`,
'민원성 요금조정':`[민원성 요금조정 SR양식]\n■고객번호\n■청구계정번호 :\n■명의자:\n■납부방법 :\n■요청자 :\n■고객불만(언제/무엇을) :\n■금액산정 :\n■적용기간 및 처리금액 :\n■기타요청사항 :\n`,
'권유[모바일판기발]':`${ban}\n[권유]\n1.업무처리 할 번호 /고객명 :\n2.약정만료 or 180일 이내 여부 :\n3.관심기종 : \n4.통화가능연락처 :\n5.특정사항 : \n6.관심도 상/중/하 :\n가입-가입권유-컨설팅요청-컨설팅요청(무선SMG)\n`,
'KT   WIFI   이관':`[kt-wifi 문의 및 불만]\n■서비스 번호 /명의자 :\n■연락처 / 민원인 :\n■이용서비스 : \n코스개통상태 ,전용요금제 또는 부가서비스 확인\n■요청사항 :\n■부서명 : UCB0043`,
'LTE EGG   TT':`${ban}\n[LTE Egg+ TT접수]\n■개통14일이내 여부 :\n■서비스 번호 : \n■명의자 :\n■요청자 :\n■연락처 :\n■주소 :\n■신호 : 초록(강함) ,주황(보통) ,빨강(약함) 등\n■모델명 :\n■증상 : \n■지상위치 : (지하1층~2층 등)\n■건물유형 : (아파트 주택가 사무실 등)\n■개통일 :\n`,
'장애공지양식':`1. 발신 :\n2. 장애일시 :\n3. 장애지역 :\n4. 현상(서비스영향) :\n5. 고객센터응대스크립트유형 :-\n6. 예상복구일시 :\n7. 담당자 :`,
'장애공지댓글':`1. 컨택일시 : (시간까지 기재)\n2. 컨택포인트 : (확인한 담당자 성함+연락처)\n3. 확인내용 :`,
'비영업 대외민원말머리':`[대외/언론언급]\n[비영업]\n■접수번호 / 성함:\n■연락처 / 요청자:\n■불만내용:\n-\n■요구사항 :\n■귀책부서명 /코드 :`,
'시설사_재이관':`[시설사 N차 재인입]\n■ 고객번호/고객명 :\n■ 요청자 :\n■ 비상연락처 :\n■ 요청사항 :\n■ 기존TT발행 SRTT번호 :\n■ 주소 :\n■ 기존TT 상태확인 : 완료 / 진행중\n■ 현재처리부서 : 시설사\n■ 시설사명 :\n■ TT처리자명(시설사 담당자) :`,
"TT발행(상담예정)":`*인터넷 가입 상담 예정고객으로 현장에서\n 고객님과 컨택 시 민원지내 아토중계기 설치필요국소인 경우 인터넷 설치예정여부 \nor 인터넷 설치 상태는 재확인부탁드립니다`,
"TT발행(유치성공)" : `*인터넷 설치 예약된 고객으로 현장에서 \n  고객님과 컨택 시 민원지내 아토중계기 설치필요국소인 경우 인터넷 설치예정여부 \n or 인터넷 설치 상태는 재확인부탁드립니다`,
"TV쿠폰제공안내" :`TV쿠폰제공안내`,
"광주전남제주 voc" : `UCD0033`,
"대구,포항 voc" : `UCL0064`,
"부산,경남,울산 voc" : `UCE0034`,
"충북 voc" : `UCC0021`,
"대전충남 VOC" : `UCK0042`,
"제주센터 고만코드" : `UCI0030`,
"KTIS군포고만" :`UC10134`,
"KTIS삼송고만" :`UCS0029`,
"KTIS광화문" : `UCF0021`,
"인프라" : `인프라로 인터넷 미가입상태~!/ 인터넷 가입권유`,
"KTIS원주(강원도)":`UCG0037`
}



$(function(){

  $('.schedule').click(function(){
      $(this).toggleClass('showing');
      if($(this).hasClass('showing')){
        $('.task_gate1').css('display','block');
      } else{
        $('.task_gate1').css('display','none');
      }
      
  });


  $('.dropbtn1').click(function(){
    $(this).toggleClass('showing2');
    if($(this).hasClass('showing2')){
      $('.dropdown-content1').css('display','block');
    } else{
      $('.dropdown-content1').css('display','none');
    }
});

   

  //맞춤법(공통메뉴)

  $('#toggle').click(function(){
    window.open("https://alldic.daum.net/grammar_checker.do","_blank","width=1000 , height=900")
   });


    //sr양식복사 

  $('.dropdown-content2 .srform1').click(function(){
    var hasclass = $(this).hasClass('Sales')
    var hasclass1 = $(this).hasClass('mutv')
    var $srvalue = $(this).val();
    var valN = localStorage.getItem('meid');
    var Telnum = $('.phoneNumber').val();
    console.log($srvalue);
    console.log(hasclass);
   // var completeTxt =`${$srvalue}/사번${valN}/${Telnum}`
    var completeTxt =`${$srvalue}/${Telnum}`
    if(hasclass){
      $lib.clipcopy2(completeTxt);
      }else if(hasclass1){
      $lib.clipcopy2(completeTxt+'/탭안내꼭!');
    }
    else{
      $lib.clipcopy2($srvalue);
    }

    $('.phoneNumber').val("");
   })

  var $password = $('.password .passmenu .passvalue button' ) //mymemo비번메뉴
  $('.passmenu').mouseover(function(){
       $('.passvalue').show().mouseout(function(){
           $('.passvalue').hide(); 
       });
   });


  $password.click(function(){  //mymemo 비번 
   var $butval = $(this).val();
   navigator.clipboard.writeText($butval);
  });


 // 애들쓰는 memo.html 수정

 
 var $compass = $('.task_gate .task_gate1 .common');
      var spe = $('.special');
      var valuearr = [];

     //비번 배열
          
      // 이름 받기 

      $('#teamperson').change(function(){
        valuearr.length = 0;
        var $selval= $(this).val();
        valuearr.push($selval);
       })

      

       $compass.click(function(){
        var attrcode = $(this).attr('data-code');
        if(navigator.clipboard){
          $lib.clipcopy(attrcode);
        }else{
          $lib.clipcopy2(attrcode);
        }        
       });

       

       spe.click(function(){
       // var speIdx = $(this).index('.special');
        var $thiskey = $(this).attr('data-code');
        var valName = valuearr[0];
        var $dbval = localStorage.getItem($thiskey);
        if(navigator.clipboard){
          $lib.clipcopy($dbval);
        }else{
          $lib.clipcopy2($dbval);
        }   
        
       })

      // 메모저장용 코드

      

       var keyvalue =[];
       var $textarea = $('textarea');
       var $textareaValue =[];     
            function keyname(){
            var ti = new Date();
            var month = ti.getMonth()+1
            var mo = ti.getDate()
            var ho = ti.getHours();
            var mi = ti.getMinutes();
            var se = ti.getSeconds();
            var $key = month+'월'+mo+"일"+ho+'시'+mi+'분'+se+'초' ;
              keyvalue.push($key);
            }

  
            var $LocalIdx = localStorage.getItem('$memoSort');
            if($LocalIdx === null){
              count = 0;
             }else{
              count = Number($LocalIdx);
             }
          $('.leftmove9').click(function(s){
              $(this).css('background-color','yellow').text('저장완료💾')
              count++
              localStorage.setItem('$memoSort',count); 
              var LocalIdx = localStorage.getItem('$memoSort');
              $('.delText').each(function(e){
              keyname();
              var ival = keyvalue[0];
              $textareaValue.push($('.delText').eq(e).val()) ; 
              localStorage.setItem('MEMO'+LocalIdx+'^'+ival+e,$textareaValue[e]);
              keyvalue.length = 0 ;
             })
             $textareaValue.length = 0;
             
             //$('#memosavebut').submit();

             const formdata = $ ('#memosavebut').serialize();
             $.ajax({
              url : '../mymemosave/memosave.php',
              type : 'post',
              data : formdata,
              success : function(response){
                console.log("서버응답",response);
                $('#memosuccess').text('⭕');
              },
              error : function(xhr,status,error){
                console.log("서버응답",error);
                $('#memosuccess').text('❌');
              }
             })


             function savealarm(){
              $('.leftmove9').css('background-color','aqua').text('메모저장💾')
             }
             setTimeout(savealarm,2000);           
             }) // 메모저장용 코드 마지막




             $('.leftmove11').click(function(e){
              e.preventDefault()
            //   var  $textarea1 = $textarea.eq(1).val(); 
                  var  $textarea1 = $('#alarmText').val();
                 localStorage.setItem(valuearr[0],$textarea1);
           }) 


            $('.leftmove12').click(function(){
              $textarea.each(function(){
                $(this).toggleClass('black');
              })
            });


            jQuery(function(){
             $('.drag').draggable(); 
            });


         
          

            $('.del').click(function(){

              $('.delText').each(function(){

                $(this).val("");

              })

            })


            $('#must').dblclick(function(){
              var $must= $(this).val();
              var $mustkey =$(this).attr('class');
              localStorage.setItem($mustkey,$must);
              $('#btn1').toggleClass('copy');
              if($('#btn1').hasClass('copy')){
                $('#btn1').css('backgroundColor','red')
              }else{$('#btn1').css('backgroundColor','white')}
            });

            

            var $mustval = localStorage.getItem('must');
            $('#must').val($mustval);

            $('.buthidden').click(function(){
             $('.buttonpack').hide()
             $('.butttonshow').show();
             $('.butttonshow').before($('.task_gate.drag'));
            })

            $('.butttonshow').click(function(){
             $('.buttonpack').show();
             $(this).hide();
             $('.buttonpack').append($('.task_gate.drag'));

            })


 // 내꺼 매일 할일 코드 개 단순 ㅠㅠ


 var $dailywork =`<ol>
 <li>메신저로그</li>
 <li>일정체크</li>
 <li>회의상담일정배포</li>
 <li>wfms체크</li>
 <li>스마일체크</li>
 <li>일출결UP</li>
 <li>일보작성</li>
 <li>전일세일즈제출</li>
 <li>면담일지작성</li>
 <li>보안점검</li>
 <li>---오후---</li>
 <li>일보UP</li>
 <li>포괄연장근무</li>
 <li>지존UP필독</li>
 <li><mark>부가일지_제출</mark></li>
 <li><mark>차&SR&신&세_제출</mark></li>
 <li><mark>진행중SR체크</mark></li>
 <li>TEST폰정리</li>
 <li>서랍&멀티탭</li>
 <li>쓰레기정리</li>
 <li>세일즈&필기백업</li>
 <li>에어컨 끄기</li>
 <li>복사기 끄기</li>
 <li>키보드,마우스끄기</li>
</ol>`






 // 매일할일에 기존 입력값을 append해서 표시해줌
 // 즉 새로 매일할일을 넣어주는것 
 $('#dailysaver').click(function(){
  $('.dropdown-content1 > *').remove()
  localStorage.setItem('dailywork',$dailywork)
  var dailywork = localStorage.getItem('dailywork');
  $('.dropdown-content1').append(dailywork);
 })


 $(document).on('click','.dropdown-content1 ol li',function(){
    $(this).remove();
     var testhtml = $('.dropdown-content1').html();
     localStorage.removeItem('RenewalHtml');
     localStorage.setItem('RenewalHtml',testhtml);
    //  $('.dropdown-content1 > *').remove();
   //  $('.dropdown-content1').append(localStorage.getItem('RenewalHtml'));
    })

    $('.dropdown-content1').append(localStorage.getItem('RenewalHtml'));

    

    

 //버튼 눌러서 매일할일 텍스트 area사라지게 하기 

  $('#musthidden').click(function(){
  $(this).toggleClass('musthidden');
  if($(this).hasClass('musthidden')){
    $('.must').attr('rows','1');
  }else{
    $('.must').attr('rows','20');
  }
 }) 



//세일즈 실적관리창 팝업 시키는 코드
  $('.salescount').click(function(){
    window.open('세일즈실적관리.html', '_blank', 'width=1000, height=650' )

  }) ;

  $('.salescount1').click(function(){
    window.open('http://folkball.dothome.co.kr/mypage/sales_php/sales_siljukcon.php', '_blank', 'width=1000, height=650' )

  }) ;
  

 // 메모창 하나 없애는 코드 분리작업

 

  $('#toggle1').click(function(){
    var toggleval = $(this).val();
    if(toggleval == '📘📘'){
         $('#hidden1').css('display','none');
         $(this).val('📘')
    } else{
      $('#hidden1').css('display','block');
      $(this).val('📘📘')
    }
  })
 
})

// 말머리 고정 
 $('#dropbtn').click(function(){
      $(this).toggleClass('class_change');
     if($(this).hasClass('class_change')){
      $('#dropdown-content2').removeClass('dropdown-content2')
      .addClass('dropdown-contentsp');
      $(this).text('머리⛔')
     }else{
      $('#dropdown-content2').removeClass('dropdown-contentsp')
      .addClass('dropdown-content2');
      $(this).text('말머리');
     }
 })

//말머리 고정2
 $('.dropbtn_se').click(function(){
  $(this).toggleClass('class_change1');
 if($(this).hasClass('class_change1')){
  $('#dropdown-content').removeClass('dropdown-contentsp1')
  .addClass('dropdown-contentsp1');
  $(this).text('양식⛔')
 }else{
  $('#dropdown-content').removeClass('dropdown-contentsp1')
  .addClass('dropdown-content2');
  $(this).text('SR양식');
 }
})

$('.minimemobtn1').on('dblclick',()=>{
  $('#minimemo').toggle();
})

$('#minimemo').on('keyup',function(){
  var $miniVal = $(this).val();
  localStorage.setItem('miniMemoVal',$miniVal);
  const $localMiniVal = localStorage.getItem('miniMemoVal');
  
})
const $localMiniVal = localStorage.getItem('miniMemoVal');
$('#minimemo').val($localMiniVal);

//서버에 저장한 메모내용 여는 코드
$('#memoview').on('click',function(){
  window.open('../mymemosave/memoview.php', '_blank', 'width=1100, height=900' ) ; return false;
})


  $('#masking').on('blur',function(){
    var $maskingtextval = $(this).val();
    var $maskingtextval1 = $maskingtextval.slice(0,3);
    var $maskingtextval2 = $maskingtextval.slice(3,7);
    var $maskingtextval3 = $maskingtextval.slice(7,11);
    $textComplete = $maskingtextval1+'*'+$maskingtextval2+'*'+$maskingtextval3;
    console.log($textComplete)
     if(navigator.clipboard){
     $lib.clipcopy($textComplete);
    }else{
      $lib.clipcopy2($textComplete);
    }
  
  })

  //---------------------------------타이머 설정
let timerid ;

  $('#newTimer').on('change',function(){
    clearTimeout(timerid);
    if($(this).val() !== '' ){
      localStorage.setItem('timerNumval',$(this).val())
      const $timerNumval = localStorage.getItem('timerNumval');
      var timerNumval = Number($timerNumval)*60000;
      timerid =  setTimeout(timerStart,timerNumval);
       $(this).css('background-color','orange');
       $(this).css({
        "transition" : `transform ${timerNumval}ms ease`, 
        "transform" : "rotate(360deg)",
        })
    }else{
      localStorage.removeItem('timerNumval');
      $('#newTimer').css({
        'background-color':'transparent',
        "transition" : `transform 1000ms ease`,
        "transform" : "rotate(0deg)"   
      });
      clearTimeout(timerid);
    }
  })

  function timerStart(){
    var timerNumtext = $('#newTimer').val()+' 분 지남'
     $('body').css('background-color','#6464CD');
    $('.alarmpop').addClass('alrmblink');
    $('.alarmpop span').remove();
    $('.alarmpop').append(`<span>${timerNumtext}</span>`);

  }

