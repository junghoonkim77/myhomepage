jQuery(function(){
        
  var  $srheadarr = []; // 내용이 담길 빈배열
  var  $srmainval = [];
  var  $minititle = [];
  var  $techsr ={'신호점검요청':'★개선여부 확인 요청★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 :\n■KT인터넷 가입여부(Y/N)/회선속도 :\n■최대5년 대외기관 접수이력(Y/N):N\n■자사가입자 동일여부:\n■기타요청사항 :\n',
    '중계기설치요청':'★중계기 시설요청 ★\n■개통14일이내 여부 :N / Y\ny일 경우 개통일자 :\n개통단말 전산일치 : Y,N \n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■중계기 유/무 :\n■모델명 : \n■요금제 :\n■KT인터넷 가입여부(Y/N)/회선속도 :\n■최대5년 대외기관 접수이력(Y/N):N\n■자사가입자 동일여부:\n■기타요청사항 :\n',
    '중계기점검요청':'★중계기 점검요청 ★\n■개통14일이내 여부 :N / Y\n  y일 경우 개통일자 : \n  개통단말 전산일치 : Y,N\n■명의자/요청자 :\n■고객번호/비상연락처 :\n■발생주소 :\n■발생증상 :\n■발생시기 :\n■램프색 :\n■중계기 전원리셋여부 :\n■기타요청사항 :\n',
    '중계기철거요청':'★중계기 철거요청 ★\n■접수자 :\n■고객번호/비상연락처 :\n■주소 :\n■사유 :\n■기타요청사항 :\n',
    'LTE_EGG_TT접수':'[LTE Egg+ TT접수]\n■개통14일이내 여부 :\n■서비스 번호 : \n■명의자 :\n■요청자 :\n■연락처 :\n■주소 :\n■신호 : 초록(강함) ,주황(보통) ,빨강(약함) 등\n■모델명 :\n■증상 : \n■지상위치 : (지하1층~2층 등)\n■건물유형 : (아파트 주택가 사무실 등)\n■개통일 :\n'
    }

  $('#srhead').change(function(){
      $srheadval = $(this).val();
      $srheadarr.push( $srheadval );
      $('.main').append(`<pre>${$srheadarr[0]}</pre>`);
      $srheadarr.length = 0;  
    
    
  })

  // li 태그 클릭시 줄긋기 
  $('li').click(function(){
   $(this).toggleClass('line');
  if($(this).hasClass('line')){
       $(this).css('text-decoration','line-through');
   }else {
       $(this).css('text-decoration','none');
      }
 }) // li클릭이벤트 끝

 //check상태의 체크박스 밸류값 모으기 .1
 $('.imsitest').click(function(){
   var $text = $('input[type="text"]')
   $text.each(function(){
        $srmainval.push( $(this).val() );
        $minititle.push( $(this).attr('data-flex') )
            
   }) // text val 모으기 
    var $radio = $('input[type="radio"]:checked');
   $radio.each(function(){
      $srmainval.push( $(this).val() )
      $minititle.push( $(this).attr('data-flex') )
      
      //radio val 모으기         
   }) //each문 끝
   $srmainval.push($('textarea').val());
     console.log( $srmainval )
     for (var j=0 ; j<$srmainval.length-1 ; j++){
      $('.main').append(`${j+1}.${$minititle[j]}: ${$srmainval[j]}`+'<br>');
     } //for문 끝
     $('.main').append(`<pre>-추가메모-</pre><pre>${$srmainval[$srmainval.length-1]}</pre>`)
    var $totaltex = document.querySelector('.main').innerText ;
    console.log( $srmainval );
    console.log( $minititle);
    navigator.clipboard.writeText($totaltex);
    $srmainval.length = 0 ;
    $('.main').text("");
 }) //체크박스 밸류값 모으기 끝

 




  // 중간 내용 바꾸기 
 
  $('.tranformer').eq(0).show();
       
  $('.trasswitch').click(function(){
    $('.maincore').eq(0).css('display','block');
    $('.maincore').eq(1).css('display','none');
    $('.maincore').eq(2).css('display','none');
       var $switchidx = $(this).index()
       console.log ($switchidx);
       $('.tranformer').hide().eq($switchidx).show();
     
})
      // 중간 내용 바꾸기 끝
  
 // 내용 지우고 체크 풀기     
  $('.imsitest1').click(function(){
      $('input[type="radio"]').each(function(){
      $(this).prop('checked',false);
    }) //체크박스 모두 해제하기 */
 
    $('input[type="text"]').each(function(){
      $(this).val('');
    }) // input text 모두 지우기
    $('textarea').val(''); //textarea 내용 지우기
    $('li').css('text-decoration','none'); //라인지우기
    $('#srhead').val("");
    $srheadarr.length = 0;
    $('#buttonpack button').removeClass('blink');
    $('.ttalarm').css('visibility','hidden');

  }) //내용 지우고 체크 풀기  끝
    
   
  //메시지  VOC탭 작업 
   
  
   $('.trasswitch1').click(function(){
    var iframe = $('.maincore > iframe')
    $('.maincore').eq(0).css('display','none');
    $('.maincore').eq(1).css('display','block');
    $('.maincore').eq(2).css('display','none');
    $(iframe).eq(0).css('display','block');
   // $('.maincore').eq(0).css('display','none');
   })   //메시지  VOC탭 작업 끝

   // TT발행 방법 탭 작업
   $('.trasswitch2').click(function(){
    var iframe = $('.maincore > iframe')
    $('.maincore').eq(0).css('display','none');
    $('.maincore').eq(1).css('display','none');
    $('.maincore').eq(2).css('display','block');
    $(iframe).eq(1).css('display','block');
   // $('.maincore').eq(0).css('display','none');
   })   //TT발행 방법 탭 작업끝

   //특정지역 클릭시 animation효과
   var $vocplace = $('.vocplace label input');
   
    $vocplace.change(function(){
      console.log($(this).val());
      if($(this).val()=='speplace'){
       $('.techsr').addClass('blink');
       $('.ttalarm').css('visibility','visible');
       $('.srnote').css('visibility','visible');
           
      }else{
        $('#buttonpack button').removeClass('blink');
        $('.ttalarm').css('visibility','hidden');
        $('.srnote').css('visibility','hidden');
      }
    })  //특정지역 클릭시 sr양식창 팝업 끝

 
    // 교육자료 창 팝업
    $('.education').click(function(){
      vocbank('휴근교육자료.html','1200');  return false;
    })

    //주소 검색창 팝업
    $('.address_daum').click(function(){
      $lib.daumpost();
    })

    var techsr = $('.techsr');
    console.log(techsr);
    $(techsr).click(function(){
     var tx = $(this).text();
     $lib.clipcopy($techsr[tx]);
     $('.copyalarm').animate({opacity:1},500);
     $('.copyalarm').animate({opacity:0},1000);
     $('.srnote_text').val($techsr[tx]);
    })

    $('.close_tt').click(function(){
      $('.srnote').css('visibility','hidden');
      $('.srnote_text').val("");
      $('#buttonpack button').removeClass('blink');
      $('.ttalarm').css('visibility','hidden');
      
    })

    $('.srnote_text_button').click(function(){
      $lib.clipcopy($('.srnote_text').val());
    })
}) //최종 블럭끝

//J쿼리 마지막 블럭
