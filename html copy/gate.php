<!DOCTYPE html5>
<html>
    <head>
     <meta charset="utf-8">
        <link rel="stylesheet"  href="../css/buttontest1.css">
        <link rel="stylesheet" href="../css/gate.css">
        <link rel="stylesheet" href="../css/TT비영업상담양식.css">

     <script src="https://code.jquery.com/jquery-3.6.1.js" 
     integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>  
     <title>통품홈</title>
      </head>
    <body>
    <div class="container">
        <header>
            <a href="https://junghoonkim77.github.io/myhomepage/html/gate.html">서울중앙통품_홈피</a>
            <button class="navhide">↙️버튼숨김</button> 
            <a href="#"  onclick="window.open('http\://folkball.dothome.co.kr/mypage/board/index.php', '_blank', `width=900, height=900` )" > / 
                    <span style="font-size:20px">📋</span>
                    <span style="font-size:20px ; color:#4285F4 ; font-weight: bold;">
                        통품</span>
                    <span style="font-size:20px ; color:#EA4335; font-weight: bold;"> 
                        최신 </span> 
                    <span style="font-size:20px ; color:#Fbbc05;  font-weight: bold;">
                        ISSUE </span>
                    <span style="font-size:20px ; color:#4285F4; font-weight: bold;"> 
                        게시판 </span>
                </a>
               
           <span id="netwindow" style="font-size:20px"><b>/ 통품전산(👀)</b> 
           <div id="netwindow1">
            <ul>
                <li><a href="https://koshelper.kt.co.kr/" target="_blank"> 넷윈도 </a></li>
                <li><a href="https://wing.kt.com" target="_blank"> 윙 3.0</a></li> 
                <li><a href="https://admin.spam.kt.com/" target="_blank"> 스팸차단서비스 </a></li>
                <li><a href="https://msens.kt.com/login" target="_blank"> 엠센스_메시지 장비</a></li>
                <li> <a href="https://5gnms.kt.co.kr/portal/" target="_blank">5G NMS(NMS안에 -> 관제 탭-> 트러블맵 확인)</a></li>
                <li> <a href="https://172.29.23.226:8443/login.html" target="_blank">특정번호 통화수신거부조회(ATAS)</a></li>
                <li> <a href="https://icrm.nb-iot.kt.com/icrm/app/athn.html#/signIn" target="_blank">기가IOT(기가빌스)</a></li>
                <li> <a href="https://www.imei.info/" target="'_blank">단말 IMEI조회 사이트(해외사이트)</a></li>
                <li> <a href="https://www.imei.kr/" target="'_blank">이동전화 단말 자급제 사이트(분실접수등 확인)</a></li>
                <li> <a href="https://www.wififree.kr/index.do" target="_blank">공공WIFI 사이트</a></li>
                <li> <a href="https://checkcoverage.apple.com/?locale=ko_KR" target="_blank">애플공식 단말정보 조회(워런티등)</a></li>
                <li> <a href="mymemo.html" onclick="vocbank('mymemo.html','350');  return false;">상담 메모장</a></li>
                <li> <a href="https://gr-cti2-fin-2a.ktgg.ipcc2.com/desktop/container/landing.jsp?locale=ko_KR" target="_blank">비상전화기(코스ID/코스ID/본인내선)</a></li>
                <li> <a href="https://junghoonkim77.github.io/myhomepage/html/통화품질_휴근업무.html" target="_blank">휴근시 통품업무 프로세스(일반팀용)</a></li>
            </ul>
           </div>
          </span>
                        
        </header>
            <section class="content">
              <nav>
                <a href="#"  class="button btnPush btnOrange" onclick="line_dp2(11)">23년감성멘트</a><br> 
                 <a href="#"  class="button btnPush btnBlueGreen" onclick="line_dp2(3)">TT&비영업양식</a><br>
                 <a href="#" class="button btnPush btnLightBlue" onclick="line_dp2(4)">통품VOC은행</a><br>   
                 <a href="#"  class="button btnPush btnLightBlue" onclick="line_dp2(10)" >통품_SALES</a><br>
                 <a href="memo.html"  class="button btnPush btnPurple" 
                            onclick="vocbank('memo.html','350');  return false;">상담 메모장</a><br>   
                 <a href="#" class="button btnPush btnPurple"  onclick="line_dp2(5)" >단말기 심플메뉴</a><br> 
                 <a href="#"  class="button btnPush btnLightBlue" onclick="line_dp2(6)" >연락처/부서코드</a><br> 
                 <a href="#"  class="button btnPush btnOrange" onclick="line_dp2(9)">일출결양식</a><br>
                 <a href="#"  class="button btnPush btnBlueGreen" onclick="line_dp2(8)">NW119접수양식</a><br>
                 <a href="#" class="button btnPush btnOrange" onclick="line_dp2(1)">팀 스케쥴</a><br>
                 <a href="#" class="button btnPush btnBlueGreen" onclick="line_dp2(2)">D+XX날짜계산</a><br>
              </nav>


              <main>
                <?php 
                include('TT비영업상담양식.html');
                ?>
              </main>
              
            </section>
            <footer>
                <a href="https://junghoonkim77.github.io/myhomepage/html/gate.html">
                    통품홈페이지</a>
                    
            </footer>
        
    </div>
    <script src="../java/voc_bank.js">  </script>
    <script>
      jQuery(function(){
     
      })
    </script>
    </body>
</html>
