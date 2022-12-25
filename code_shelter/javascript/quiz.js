
$(function(){
    $('button').on('click',function(){
        $('div').css({'position':'absolute','width':'150px','border':'1px solid gray','font-size':'20px','font-weight':'bold'});
        let no0 =['드라이나','뻣쭈','쭈빵이','말랑흑','돼지쭌','톰크루즈']
        let no1 =['어벤저스','토르','스파이더맨','아이언맨','앤트맨','엔드게임']
        let no2 =['사과','배','바나나','귤','수박','딸기']
        let no3 =['남대문','시청앞광장','갈치조림','인왕산','을지로','무교동낙지']
        let no4 =['닭도리탕','집돈까스','엄마표김볶','아빠짜파게티','관악역닭','KFC']
        let no5 =['방탄소년단','블랙핑크','세븐틴','오마이걸','아이브','세븐틴']
        let no6 =['관악산','삼성산','수리산','설악산','지리산','한라산']
        let no7 =['여우','호랑이','오리','원숭이','망아지','사자']
        let no8 =['송강호','유해진','마동석','공유','조정석','한석규']
        let no9 =['관악역','시청역','서울역','안양역','석수역','금천구청역']
        
        let prom =document.getElementById('GN').value;
        let link ='https://junghoonkim77.github.io/myhomepage/code_shelter/javascript/게임엔딩.html"'
        if(prom === "1"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},600,'swing');
            $(this).html(no1[divs]);
                      
        });
        } else if(prom === "2"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no2[divs]);
              
        });
        } else if (prom ==="3"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no3[divs]);
        });
        } else if (prom ==="4"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no4[divs]);
        });
        } else if (prom ==="5"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no5[divs]);
        });
        } else if (prom ==="6"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no6[divs]);
        });
        } else if (prom ==="0"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no0[divs]);
        });
        } else if (prom ==="7"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no7[divs]);
        });
        } else if (prom ==="8"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no8[divs]);
        });
        } else if (prom ==="9"){
            $('div').each(function(divs){
            $(this).animate({'left':divs*100+'px','color':'red','margin':divs*50+'px'},500,'swing');
            $(this).html(no9[divs]);
        });
        } else {
            window.open(link)
        }
    
        $('div').animate({'margin':'0px','left':'0px','color':'blue','opacity':0},700);
    }); 
    });
    
     
   
   
    