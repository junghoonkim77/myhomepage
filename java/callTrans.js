const content = {"galaxy_w" :`
    1.워치번호 조회후 "착신전환(무료)_대표" 서비스 가입여부 확인
    2.HD보이스 서비스 정상 가입여부 확인
    3.해당 서비스 클릭후 착신전환 그룹 설정에 고객의 메인 휴대폰 번호 그룹설정 여부 확인
    4."원넘버서비스(무료)" 가입여부 확인
    => 1,2,3,4, 정상 등록 및 가입상태 확인시 즉시 기술 호전환
    `,
    "apple_w" :`
    1.워치번호 조회후 "원넘버서비스(무료)_애플" 가입여부 확인
    2.HD보이스 정상 가입여부 확인
    ※애플워치는 착신전환 서비스와 전혀 무관한 기기입니다.
     1,2  정상 등록 및 가입상태 확인시 즉시 기술 호전환
    `
    };

    const $li = $('ol li ul>li');
    
    $li.click(function(){
        var $id = $(this).attr('id');
        var $content = content[$id];
        $('.content').text($content);
    })