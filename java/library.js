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
     }





} //lib의 끝

