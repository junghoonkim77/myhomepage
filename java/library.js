// 각종 유용한 함수 모음

var $lib ={
    //무작위 숫자 추출
    "randomNum":function(min,max){ 
        return Math.floor(Math.random() * (max-min+1)) + min;
    },
    //클립보드 문자 카피
    "clipcopy":function(content){
        navigator.clipboard.writeText(content);
    },
    "clipcopy2":function(content){
        var $textbox = document.createElement('textarea');
            $textbox.value = content;
            document.body.appendChild($textbox);
            $textbox.select();
            document.execCommand('copy');
            document.body.removeChild($textbox);
    }
    ,
    //다음주소검색 꼭 추가해야됨 
    //  <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    "daumpost":function() {
        new daum.Postcode({
            oncomplete: function(data) {
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }
                if(data.userSelectedType === 'R'){
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                     if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                   if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                 document.getElementById("sample6_extraAddress").value = extraAddr;
              
                } else {
                    document.getElementById("sample6_extraAddress").value = '';
                }
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                document.getElementById("sample6_detailAddress").focus();
            }
        }).open();
    }, // 주소 검색창 객체끝

     // 글자수 카운트 함수
     "bytes":function(str){
        var l = 0;
        for (var i=0; i<str.length; i++) l += (str.charCodeAt(i) > 128) ? 2 : 1;
        return l;
     },
      
      // 날짜,시간 함수  아래껄 꼭 붙여넣고 써야됨
      //var[$year,$month,$day,$hour,$minutes,$timeHMS,$timeYMD,$timeYMD2] =$lib.$time();
     "$time":function(){
        var time = new Date();
        var $year = time.getFullYear();
        var $month = time.getMonth()+1
        var $day = time.getDate()
        var $hour = time.getHours();
        var $minutes = time.getMinutes();
        var $seconds = time.getSeconds();
        var $timeHMS = `${$hour<10 ? `0${$hour}`:$hour}:${$minutes<10 ? `0${$minutes}`:$minutes}:${$seconds<10 ? `0${$seconds}`:$seconds}`
        var $timeYMD =`${$year}년 ${$month}월 ${$day}일`
        var $timeYMD2 =`${$year}/${$month}/${$day}`
        return [$year,$month,$day,$hour,$minutes,$timeHMS,$timeYMD,$timeYMD2 ];
     },

     //영역을 카피해주는 함수 대박 좋음   $lib.rangecopy('.tg');

     "rangecopy":function(node){
        const $node =document.querySelector(node);
    const range = document.createRange();
    range.selectNode($node);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    
    document.execCommand('copy');
    window.getSelection().removeAllRanges();

     },
    
  //동적으로 submit버튼 형성 해주는 함수
  /*사용법 
    var $form1 =subMit_button ( php파일경로,
    post나 get,
    어떤ID나클래스로 들어갈지,
    input타입종류,
    전달할 name,
    placeholder);

     $('#yourel').click(function() {
  $form1.submit();
}); */
    "subMit_button": function($phpurl,$method,$form_position,$inputtype,$name,$placeholder){
        var $form = $('<form>', {
      'action': $phpurl,
      'method': $method
    }).appendTo($form_position);
     
      $('<input>').attr({
      'type': $inputtype,
      'name': $name,
      'value': '',
      'placeholder':$placeholder
    }).appendTo($form);
         return $form;
    },

  //배열안에 중복값 찾아 내는 코드  

   "fdoubleearr":function(arr){
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

   /*
   사용예시 함수안에 파라미터로 배열을 넣고 함수를 변수에 담는다.
   변수의 길이를 측정해 길이가 0보다 크면 이후에 취할 조치를 조건문등을
   적용해 처리한다.
     var test =  fdoubleearr($sr);
     console.log(typeof(test));
     if(test.length > 0){
      $('.double').text('중복입력!').addClass('blink');
      $.each(test,function(idx,elem){
        $('.double').after(`<span style="font-size:10px;">/ ${elem}</span>`)
      })

     }else{
      $('.double').removeClass('blink').text('');
     } 
      

   
   */

   



} //$lib 객체의 끝

