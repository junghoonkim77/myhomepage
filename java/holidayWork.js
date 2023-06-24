jQuery(function(){
        
    var  $srheadarr = []; // 내용이 담길 빈배열
    var  $srmainval = [];
    var  $minititle = ['서비스번호 :','민원인 :','비상연락처 :','증상 :','발생시기 :','장소상관여부 :'
                        ,'주변KT 상관여부 :','전산이상여부 :','단말리셋여부 :','메모전달 :'];
    

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
        console.log( $srmainval );
     }) // text val 모으기 
      var $radio = $('input[type="radio"]:checked');
     $radio.each(function(){
        $srmainval.push( $(this).val() )
        console.log( $srmainval );
        //radio val 모으기         
     }) //each문 끝
     $srmainval.push($('textarea').val());
       console.log( $srmainval )
       for (var j=0 ; j<$srmainval.length ; j++){
        $('.main').append(`${j+1}.${$minititle[j]} ${$srmainval[j]}`+'<br>');
       } //for문 끝
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
     console.log ( $('.maincore') ) 
     $('.trasswitch1').click(function(){
      
      $('.maincore').eq(0).css('display','none');
      $('.maincore').eq(1).css('display','block');
      $('iframe').css('display','block');
     // $('.maincore').eq(0).css('display','none');
      

    })
      
  })
  
 //J쿼리 마지막 블럭