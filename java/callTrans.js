const content = {
    "galaxy_1": `
    1. 워치번호 조회후 "착신전환(무료)_대표" 서비스 가입여부 확인
    2. 해당 서비스 클릭후 착신전환 그룹 설정에 고객의 메인 휴대폰 번호 그룹설정 여부 확인
    3. "원넘버서비스(무료)" 가입여부 확인
    4. HD보이스 서비스 정상 가입여부 확인
   
    ☞ 1,2,3,4, 정상 등록 및 가입상태 확인시 즉시 기술 호전환
    `,
    "galaxy_2": `
    -KT웨어러블 콜은 KT통신사 부가서비스 ( 동시착신 ,착신전환)이용을 위해 필수적으로
    필요한 앱
    -워치에는 기본적으로 설치돼 있으며 휴대폰엔 고객이 직접 설치해야됨
    (구글 플레이스토어,원스토어 통해서 진행)
    `,
    "qos": `
    1. [M]사용량정보-조회 클릭 - 하단에 Qos/차단상태조회 클릭 -
    Qos상태 (MAX:정상 / 그 외 값은 속도제어 상태로 보고 데이터
    잔여량등 확인후 완결상담)
    2. 요금제가 낮은데 유튜브나 각종 인터넷 이용시 끊긴다고 주장하는 경우
    : 고객님 단말기에 WIFI설정을 꺼보시겠습니까?
    (시니어 고객인 경우 본인이 와이파이를 이용하고 있다는 사실을 미인지하는 경우가 많음)
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
        var $imgfile = $id+'.jpg'
        console.log($imgfile);
        var $url = "../imgfolder/";
        var $content = content[$id];
        $('#picture img').attr("src",$url+$imgfile );
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
