$(function(){
    let $duration =300;
    let $image =$('#images p');
    let $nth = ":nth-child"
    $image.filter($nth+"(1)").mouseover(function(){
        $(this).find('span,strong').stop().animate({opacity :1},$duration)
    }).mouseout(function(){
        $(this).find('span,strong').stop().animate({opacity :0},$duration)
    });

    $image.filter($nth+"(2)").mouseover(function(){
        $(this).find('span').stop().animate({opacity :1},$duration);
        $(this).find('strong').stop().animate({opacity:1,left :0},$duration);
    }).mouseout(function(){
        $(this).find('span').stop().animate({opacity :0},$duration);
        $(this).find('strong').stop().animate({opacity:0,left :-200},$duration);
    });
    
})