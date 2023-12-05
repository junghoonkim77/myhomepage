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
  $alarmobject[$alarmKey] = timeVal
  var alarmobjString =JSON.stringify($alarmobject)
  console.log(alarmobjString);
  localStorage.setItem('$alarmString',alarmobjString);

 // var alarmval = $('#alarmText').val()
 // localStorage.setItem('alarmval',alarmval)
 // $('.alarmpop').append(localStorage.getItem('alarmval'));
  })
  const $alarmobjParse = JSON.parse(localStorage.getItem('$alarmString'))
  
  
  $.each($alarmobjParse,function(key,val){
    $(`#${key}`).val(val);
    })
  
  
function getAlarm()
{  
const $setTime1 = $('#inputtime0');
const $setTime2 = $('#inputtime1');
const $setTime3 = $('#inputtime2');
const $setTime4 = $('#inputtime3');

const setTime1 = $setTime1.val();
const setTime2 = $setTime2.val();
const setTime3 = $setTime3.val();
const setTime4 = $setTime4.val();

const date = new Date();  
const hours = date.getHours();  
const minute = date.getMinutes();  
const current = `${hours < 10 ? `0${hours}` : hours}:${minute < 10 ? `0${minute}` : minute}`;
const cond1 = current == setTime1;
const cond2 = current == setTime2;
const cond3 = current == setTime3;
const cond4 = current == setTime4;
const conditions = [cond1, cond2, cond3, cond4];
const names = {0: "inputtime0", 1: "inputtime1", 2: "inputtime2", 3: "inputtime3"}

for (let i=0; i<conditions.length; i++){
  if(conditions[i]){
    
  //  $('body').css('background-color','tomato');
  //  $('.alarmpop').addClass('alrmblink');
  console.log ($alarmobjParse ) 
  delete $alarmobjParse[names[i]];
  console.log ($alarmobjParse ) 
 //  var alarmobjString =JSON.stringify($alarmobjParse)
  // localStorage.setItem('$alarmString',alarmobjString);
 //  $alarmobjParse =JSON.parse(localStorage.getItem('$alarmString'));
  // $.each($alarmobjParse,function(key,val){
  //  $(`#${key}`).val(val);
  //  })
  }
  } //바로 위에 for문
 } //getAlarm 함수끝임




$('.xbutton').click(function(){
  $lib.clipcopy(localStorage.getItem('alarmval'))
  $('.alarmpop').removeClass('alrmblink');
  $('body').css('background-color','white');
    $('.inputtime').val("");
    localStorage.removeItem('alarmTime');
})


function getTime(){
const time = new Date();
const hour = time.getHours();
const minutes = time.getMinutes();
const seconds = time.getSeconds();
//clock.innerHTML = hour +":" + minutes + ":"+seconds;
//clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}:${seconds<10 ? `0${seconds}`:seconds}`;
clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}`;
}


function init(){
setInterval(getTime, 20000);
alarm = setInterval(getAlarm, 20000);
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



let SRarray = 
{'통품SR기본양식':'[반]\n★통품SR양식★\n■서비스 번호 :\n■민원인 :\n■연락처 :\n■증상 :\n■발생 시기 :\n■확인 및 안내사항 :\n#단말기 오류문구 :',
'개선여부확인TT':'[반]\n★개선여부 확인 요청★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 :\n■기타요청사항 :\n',
'설치 중계기 TT':'[반]\n★중계기 시설요청 ★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 : \n■기타요청사항 :\n',
'점검AS 중계기 TT':'[반]\n★중계기 점검요청 ★\n■개통14일이내 여부 :N / Y\n  y일 경우 개통일자 : \n  개통단말 전산일치 : Y,N\n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■램프색 :\n■중계기 전원리셋여부 :\n■기타요청사항 :\n',
'이설TT  중계기 ':'[반]\n★중계기 이설요청 ★\n■명의자 / 요청자\n■고객번호/비상연락처 :\n■현주소 :\n■이전할 주소 :\n■사유 :\n■기타요청사항 :',
'철거TT   중계기 ':'[반]\n★중계기 철거요청 ★\n■접수자 :\n■고객번호/비상연락처 :\n■주소 :\n■사유 :\n■기타요청사항 :\n',
'비영업 불만양식':'[비영업]\n■접수번호 / 성함:\n■연락처 / 요청자:\n■불만내용:\n-\n■요구사항 :\n■귀책부서명 /코드 :',
'영업 VOC접수양식':'[영업]\n■접수번호 / 성함:\n■연락처/요청자/명의자와의 관계:\n■불만내용: 주요 불만 요약정리\n-\n■서식지 확인내용: ex.서식지 확인시 36개월이나 24개월로 안내받음 등\n■요구사항 :\n■귀책대리점명 /코드 :\n■대리점 기경유/긴급/접촉거부:',
'민원성 요금조정':'[민원성 요금조정 SR양식]\n■고객번호\n■청구계정번호 :\n■명의자:\n■납부방법 :\n■요청자 :\n■고객불만(언제/무엇을) :\n■금액산정 :\n■적용기간 및 처리금액 :\n■기타요청사항 :\n',
'권유[모바일판기발]':'[반]\n[권유]\n1.업무처리 할 번호 /고객명 :\n2.약정만료 or 180일 이내 여부 :\n3.관심기종 : \n4.통화가능연락처 :\n5.특정사항 : \n6.관심도 상/중/하 :\n가입-가입권유-컨설팅요청-컨설팅요청(무선SMG)\n',
'KT   WIFI   이관':'[반]\n[kt-wifi 문의 및 불만]\n■서비스 번호 /명의자 :\n■연락처 / 민원인 :\n■이용서비스 : \n코스개통상태 ,전용요금제 또는 부가서비스 확인\n■요청사항 :\n■부서명 : UCB0043',
'LTE EGG   TT':'[반]\n[LTE Egg+ TT접수]\n■개통14일이내 여부 :\n■서비스 번호 : \n■명의자 :\n■요청자 :\n■연락처 :\n■주소 :\n■신호 : 초록(강함) ,주황(보통) ,빨강(약함) 등\n■모델명 :\n■증상 : \n■지상위치 : (지하1층~2층 등)\n■건물유형 : (아파트 주택가 사무실 등)\n■개통일 :\n',
'장애공지양식':'1. 발신 :\n2. 장애일시 :\n3. 장애지역 :\n4. 현상(서비스영향) :\n5. 고객센터응대스크립트유형 :-\n6. 예상복구일시 :\n7. 담당자 :',
'장애공지댓글':'1. 컨택일시 : (시간까지 기재)\n2. 컨택포인트 : (확인한 담당자 성함+연락처)\n3. 확인내용 :',
'비영업 대외민원말머리':'[대외/언론언급]\n[비영업]\n■접수번호 / 성함:\n■연락처 / 요청자:\n■불만내용:\n-\n■요구사항 :\n■귀책부서명 /코드 :',
'시설사_재이관':'[시설사 N차 재인입]\n■ 고객번호/고객명 :\n■ 요청자 :\n■ 비상연락처 :\n■ 요청사항 :\n■ 기존TT발행 SRTT번호 :\n■ 주소 :\n■ 기존TT 상태확인 : 완료 / 진행중\n■ 현재처리부서 : 시설사\n■ 시설사명 :\n■ TT처리자명(시설사 담당자) :',
}



$(function(){

 


  // 체크박스 체크하면 parent node지우는 코드
 /* let check = $('label input:checkbox')
  console.log(check.parent().parent());
  check.on('click',function(){
    if($(this).prop('checked')){
      $(this).parent().remove();
    } else {
      $(this).parent().css('background-color','transparent');
    };
  }); */

  /* $('.schedule').on('click',function(){
    $('div.task_gate div').toggleClass('task_gate1');
  }) 
    $('.schedule').mouseover(function(){
      $('.task_gate1').show().mouseout(function(){
        $('.task_gate1').hide();
      })
    })*/

    

 //글자크기 줄이고 늘리는 코드 
 /* var BasicSize = 12;
  $('.leftmove6').click(function(){
      BasicSize--
      $('textarea').css('font-size',BasicSize+'px');
      console.log($('textarea'));
  });

  $('.leftmove7').click(function(){
      BasicSize++
      $('textarea').css('font-size',BasicSize);
  }) */

  

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

   

  //시간초기화 (공통메뉴)

  $('#toggle').click(function(){
    $('body').css('background-color','white');
    $('.inputtime').val("");
    localStorage.removeItem('alarmTime');
   });


    //sr양식복사 

  $('.dropdown-content2 .srform1').click(function(){
    var hasclass = $(this).hasClass('Sales')
    var $srvalue = $(this).val();
    var valN = localStorage.getItem('meid');
    var Telnum = $('.phoneNumber').val();
    console.log($srvalue);
    console.log(hasclass);
    var completeTxt =`${$srvalue}/사번:${valN}/${Telnum}`
    if(hasclass){
      navigator.clipboard.writeText(completeTxt);
      console.log(completeTxt)
    }else{
      navigator.clipboard.writeText($srvalue);
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
        console.log(attrcode);
        navigator.clipboard.writeText(attrcode);
       });

       

       spe.click(function(){
       // var speIdx = $(this).index('.special');
        var $thiskey = $(this).attr('data-code');
        var valName = valuearr[0];
        var $dbval = localStorage.getItem($thiskey);
        navigator.clipboard.writeText($dbval);

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

  

          $('.leftmove9').click(function(s){
             s.preventDefault();
             $('.delText').each(function(e){
              keyname();
              var ival = keyvalue[0];
              $textareaValue.push($('.delText').eq(e).val()) ; 
              localStorage.setItem(ival+e,$textareaValue[e]);
              keyvalue.length = 0
             })
             $textareaValue.length = 0;             
             })


             $('.leftmove11').click(function(e){
              e.preventDefault()
              var $textarea1 = $textarea.eq(1).val(); 
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
 <li>tv전원on</li>
 <li>상담일지체크</li>
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
 <li>컵설겆이</li>
 <li>세일즈&필기백업</li>
 <li>키보드,마우스끄기</li>
</ol>`


localStorage.setItem('dailywork',$dailywork)



 // 매일할일에 기존 입력값을 append해서 표시해줌
 // 즉 새로 매일할일을 넣어주는것 
 $('#dailysaver').click(function(){
  $('.dropdown-content1 > *').remove()
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


 /* 스크롤 하면 attr 속성 변경하기 

  var $win = $(window);

   $win.scroll(function(){

    if($win.scrollTop() > 10){

      $('.must').attr('rows','1');

    }else{

      $('.must').attr('rows','20');

    }

  })


  var musttop = $('#must').offset();

  console.log(musttop.top);

  console.log($('#must').outerHeight(true));

  console.log($('.buttonpack').outerHeight(true));

  */


  $('.salescount').click(function(){
    window.open('세일즈실적관리.html', '_blank', 'width=1200, height=650' )

  })


  

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
