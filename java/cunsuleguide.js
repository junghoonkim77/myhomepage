jQuery(function(){
        
  var  $srheadarr = []; // 내용이 담길 빈배열
  var  $srmainval = [];
  var  $minititle = [];
  

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
      console.log( $srmainval );
      //radio val 모으기         
   }) //each문 끝
   $srmainval.push($('textarea').val());
     console.log( $srmainval )
     for (var j=0 ; j<$srmainval.length-1 ; j++){
      $('.main').append(`${j+1}.${$minititle[j]}: ${$srmainval[j]}`+'<br>');
     } //for문 끝
     $('.main').append(`<pre>-추가메모-</pre><pre>${$srmainval[$srmainval.length-1]}</pre>`)
    var $totaltex = document.querySelector('.main').innerText 
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

  }) //내용 지우고 체크 풀기  끝
    
   
  //메시지  VOC탭 작업 
   
   console.log ( $('.maincore > iframe'))
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

   //특정지역 클릭시 sr양식창 팝업
   var $vocplace = $('.vocplace label input');
   console.log( $vocplace );
    $vocplace.change(function(){
      console.log($(this).val());
      if($(this).val()=='speplace'){
        vocbank('SR다이어트휴근용.html','700');  return false;
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

}) //최종 블럭끝

//J쿼리 마지막 블럭
