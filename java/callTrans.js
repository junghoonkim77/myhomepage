const content = {
    "galaxy_1": `
    1. 워치번호 조회후 "착신전환(무료)_대표" 서비스 가입여부 확인
    2. 해당 서비스 클릭후 착신전환 그룹 설정에 고객의 메인 휴대폰 번호 그룹설정 여부 확인
    3. "원넘버서비스(무료)" 가입여부 확인
    4. HD보이스 서비스 정상 가입여부 확인
   
    ☞ 1,2,3,4, 정상 등록 및 가입상태 확인시 즉시 기술 호전환
    `,
    "galaxy_2": `
    -KT웨어러블 콜은 KT통신사 부가서비스 ( 동시착신 ,원넘버 발신 ,착신전환)이용을 위해 필수적으로
    필요한 앱
    -워치에는 기본적으로 설치돼 있으며 휴대폰엔 고객이 직접 설치해야됨
    (구글 플레이스토어,원스토어 통해서 진행)
    -무조건 폰에 KT웨어러블 콜 앱이 설치 돼 있어야만 앱 이용 가능함
    -착신전환은 폰이나 워치를 통해 수동입력 (Ex.*77+연결번호입력 + 통화버튼)후에도 설정 가능하지만 
    "동시착신,원넘버 발신" 기능은 반드시 KT웨어러블 콜 앱을 통해서만 설정 가능
    
    `,
    "galaxy_3": `
    1.동시착신 서비스
     : 고객이 폰을 먼곳에 두고 오거나 혹은 폰과 워치를 동시에 휴대하지 않은 상태에서 상대방이 고객의
     폰으로 전화를 걸면 폰으로 수신됨과 동시에 워치로도 수신되는 서비스
     (단 동시착신 서비스는 문자나 기타 앱 알림등은 해당되지 않고 오로지 음성 통화만 동시에 수신됨) 
     
     ※고객이 음성 통화 외에 문자나 카카오톡을 비롯한 각종 앱알림이 수신되지 않는다고 주장하면 갤럭시
     웨어러블 앱을 통해 알림 설정이 필요하며 이 경우 삼성전자 AS센터 번호를 알려주고 종결

     2.원넘버 발신 :
     : 고객이 폰을 먼곳에 두고 오거나 혹은 폰과 워치를 동시에 휴대하지 않은 상태에서 워치로 전화를 걸게
     되는 경우 고객의 워치회선 번호가 아닌 휴대폰 번호가 상대방측으로 표시되게끔 하는 기능
     
    `
};

    const $li = $('ol li ul>li');
    const $li_M =$('ol li ul li ul');
    const $li_m =$('ol li ul li ul>li');
    const $first_menu = $('.first_menu');
    const $small_name = $('.small_name');
    const realmenu = $first_menu.find('li');
        
    realmenu.click(function(){
        var $id = $(this).attr('id');
            var $imgfile ="../imgfolder/"+ $id+'.jpg'
            console.log($imgfile);
            var $content = content[$id];
          $('#picture img').attr("src",$imgfile );
        
       
        $('#real_content').text($content);
        
        
    })

   /* $first_menu.mouseover(function(){
        $(this).children().children().stop().slideDown()
    })
    
    $first_menu.mouseout(function(){
        $(this).children().children().stop().slideUp()
    }) */

   $small_name.click(function(){
   $(this).parent().find('li').toggle();
   })
