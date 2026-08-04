<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php');

// ... (기본 PHP 로직 유지) ...
$mobilegoal = 4;
$teams = ['무1', '무2', '무3', '무4', '통품'];
$teamData = [];
$teamboan = [];
foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT it_tend , m_end , tri_end , success_end , successnew , success_end1, todaytime FROM c2sales_end WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['인티' => $row['it_tend'], '모바일' => $row['m_end'], '통리' => $row['tri_end'], '가설' => $row['success_end'] , '가설문' => $row['successnew'],'가설2' => $row['success_end1'],'시간' => $row['todaytime']];
    }
}

foreach($teams as $team){
    $sqlboan = "SELECT * FROM dailyboan WHERE teamname = '$team'";
    $reboan = mysqli_query($conn, $sqlboan);
    while ($rowboan = mysqli_fetch_array($reboan)) {
        $teamboan[$team][] = ['보안점검' => $rowboan['boanresult'], '시간' => $rowboan['inputday']];
    }
}

$mu1 = [$teamData['무1'][0]['인티'], $teamData['무1'][0]['모바일'], $teamData['무1'][0]['통리'], $teamData['무1'][0]['가설'],$teamData['무1'][0]['가설문'],$teamData['무1'][0]['가설2'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['인티'], $teamData['무2'][0]['모바일'], $teamData['무2'][0]['통리'], $teamData['무2'][0]['가설'],$teamData['무2'][0]['가설문'],$teamData['무2'][0]['가설2'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['인티'], $teamData['무3'][0]['모바일'], $teamData['무3'][0]['통리'], $teamData['무3'][0]['가설'],$teamData['무3'][0]['가설문'],$teamData['무3'][0]['가설2'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['인티'], $teamData['무4'][0]['모바일'], $teamData['무4'][0]['통리'], $teamData['무4'][0]['가설'],$teamData['무4'][0]['가설문'],$teamData['무4'][0]['가설2'],$teamData['무4'][0]['시간']];
$tong = [$teamData['통품'][0]['인티'], $teamData['통품'][0]['모바일'], $teamData['통품'][0]['통리'], $teamData['통품'][0]['가설'],$teamData['통품'][0]['가설문'],$teamData['통품'][0]['가설2'],$teamData['통품'][0]['시간']];

$boteam1 =[$teamboan['무1'][0]['보안점검'], $teamboan['무1'][0]['시간']];
$boteam2 =[$teamboan['무2'][0]['보안점검'], $teamboan['무2'][0]['시간']];
$boteam3 =[$teamboan['무3'][0]['보안점검'], $teamboan['무3'][0]['시간']];
$boteam4 =[$teamboan['무4'][0]['보안점검'], $teamboan['무4'][0]['시간']];
$botong =[$teamboan['통품'][0]['보안점검'], $teamboan['통품'][0]['시간']];

$weekday = date('l'); 
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"];

$sql1 = "SELECT id, teamname, regiday, noticon FROM cs2noti ORDER BY id DESC";
$result1 = mysqli_query($conn, $sql1);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> 
    <script src="../../java/library.js"></script> 

    <style>
        * { box-sizing: border-box; } /* 모바일 레이아웃 안정을 위한 설정 */
        body { font-family: 'Pretendard', sans-serif; background-color: #f4f7fa; margin: 0; padding: 10px; }
        h3, h4, h5 { margin: 0 0 8px 0; color: #1e293b; font-size: 1rem; }

        .main-wrapper { display: flex; flex-direction: column; gap: 12px; max-width: 1300px; margin: 0 auto; }

        /* 상단 헤더 및 링크 버튼 모바일 대응 */
        .header-area { display: flex; flex-direction: column; gap: 10px; margin-bottom: 5px; }
        .header-area h3 { text-align: center; font-size: 1.1rem; word-break: keep-all; line-height: 1.4; }
        .header-links { display: flex; flex-direction: column; gap: 6px; }
        .header-links a { background: #2563eb; color: white; padding: 10px; border-radius: 8px; font-size: 0.9rem; text-decoration: none; text-align: center; font-weight: bold; }

        /* 표시 영역 레이아웃 (모바일에서는 세로, PC에서는 가로) */
        .display-section { display: flex; flex-direction: column; gap: 12px; }

        #tablecopy, #timebox, #cs2toolbox { background: #fff; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; width: 100%; }

        /* 테이블 콤팩트화 및 모바일 가로 스크롤 적용 */
        .table-responsive { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; }
        table { border-collapse: collapse; width: 100%; font-size: 0.85rem; min-width: 450px; } /* 최소 너비를 주어 텍스트 뭉개짐 방지 */
        thead td { background-color: #1e293b; color: white; padding: 8px 5px; text-align: center; white-space: nowrap; }
        td { border-bottom: 1px solid #e2e8f0; padding: 8px 3px; text-align: center; }
        .team1 { background-color: #f8fafc; font-weight: bold; text-align: center; white-space: nowrap; }
        tfoot td { background-color: #f1f5f9; font-weight: 800; color: #2563eb; padding: 8px 3px; }

        /* 입력 시간/보안결과 텍스트 축소 */
        .tabcopy { background-color: #2563eb; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; cursor: pointer; margin-bottom: 10px; width: 100%; font-weight: bold; }
        .teamcom { font-size: 0.85rem; margin: 6px 0; padding-bottom: 6px; border-bottom: 1px dashed #e2e8f0; display: flex; justify-content: space-between; align-items: center; }
        .teamcom span { padding: 2px 6px; border-radius: 4px; }
        
        #boanBox div { padding: 6px 10px; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 6px; font-size: 0.8rem; line-height: 1.3; }

        /* 하단 입력창 모바일 최적화 */
        .input-section { 
            background: #fff; padding: 15px; 
            border-radius: 10px; border: 1px solid #e2e8f0; 
        }
        form { margin: 0; padding: 0; width: 100%; }
        fieldset { border: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; align-items: center; gap: 8px; }
        
        select, input[type="number"], input[type="text"] { padding: 8px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; }
        input[type="number"] { width: 60px; text-align: center; flex: 1; min-width: 50px; }
        select { flex: 1; min-width: 100px; }
        
        .input-group { display: flex; align-items: center; gap: 4px; flex: 1 1 calc(33% - 8px); min-width: 80px; }
        .input-group label { font-size: 0.8rem; font-weight: 600; color: #64748b; white-space: nowrap; }

        .button1, .button2 { 
            background-color: #0f172a; color: white; border: none; padding: 12px; 
            border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; width: 100%; margin-top: 10px;
        }

        .boancom { display: none; }

        /* 공지사항 레이아웃 모바일 최적화 */
        .sub-wrapper { display: flex; flex-direction: column; gap: 12px; margin: 12px auto 0; width: 100%; }
        .noticeinput, .noticeview { background: #fff; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; width: 100%; }
        .noticeview { max-height: 500px; overflow-y: auto; }

        .noticeinput fieldset { display: flex; flex-direction: column; gap: 8px; align-items: stretch; }
        .noticeinput textarea { width: 100%; height: 80px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; resize: none; }

        .notice-item { padding: 10px 0; border-bottom: 1px solid #f1f5f9; font-size: 0.85rem; }
        .notice-item:last-child { border-bottom: none; }
        .notice-tag { background: #e2e8f0; color: #475569; padding: 3px 8px; border-radius: 4px; font-weight: bold; font-size: 0.75rem; margin-right: 5px; }
        .notice-date { float: right; color: #94a3b8; font-size: 0.75rem; margin-top: 3px; }

        .notice-container { width: 100%; margin: 10px auto; }
        .notice-card { border: 1px solid #e2e8f0; padding: 12px; margin-bottom: 10px; border-radius: 8px; background: #f8fafc; }
        .notice-header { border-bottom: 1px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; color: #475569; font-size: 0.85rem; }
        .team-badge { background: #2563eb; color: #fff; padding: 3px 8px; border-radius: 4px; font-weight: bold; font-size: 0.75rem; }
        .notice-body { white-space: pre-wrap; word-break: break-all; line-height: 1.4; font-size: 0.85rem; color: #1e293b; }

        /* 데스크톱(PC) 화면용 미디어 쿼리 (화면이 넓을 때 원래 의도한 가로 배치 유지) */
        @media (min-width: 768px) {
            .header-area { flex-direction: row; justify-content: space-between; align-items: center; }
            .header-area h3 { text-align: left; }
            .header-links { flex-direction: row; }
            .display-section { flex-direction: row; align-items: stretch; }
            #tablecopy { flex: 0 0 500px; }
            #timebox { flex: 0 0 160px; }
            #cs2toolbox { flex: 1; }
            .input-section fieldset { flex-wrap: nowrap; }
            .button1 { width: auto; margin-top: 0; }
            .sub-wrapper { flex-direction: row; }
            .noticeinput { flex: 1; }
            .noticeview { flex: 3; max-height: 700px; }
        }
    </style>

    <title>CS2센터 Sales일실적</title>
</head>

<body>
    <div class="main-wrapper">
        
        <div class="header-area">
            <h3>서울중앙 CS센터(무선) 일 실적 및 보안 점검 창</h3>
            <div class="header-links">
                <a href="../monthSales/index.php">CS센터 누적개통 실적창 이동</a>
                <a href="../../center1/today_end_sales/index.php">CS센터(유선)일 실적창 이동</a>
            </div>
        </div>

        <div class="display-section">
            <div id="tablecopy">
                <h4><?php echo date("m/d").'('.$days[$weekday].') 실적'; ?></h4>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr><td>구분</td><td>인티</td><td>모바일</td><td>IT가설</td><td>M유치<br>(목표):<?php echo $mobilegoal.'건' ?></td><td>M유치부족</td></tr>
                        </thead>
                        <tbody>
                            <tr><td class="team1">무선1</td><td class="it"><?php echo $mu1[0] ?></td><td class="mobile"><?php echo $mu1[1] ?></td><td class="succeed"><?php echo $mu1[3] ?></td><td class="succeed1"><?php echo $mu1[5] ?></td><td class="msucceed"><?php echo $mobilegoal-$mu1[5] ?></td></tr>
                            <tr><td class="team1">무선2</td><td class="it"><?php echo $mu2[0] ?></td><td class="mobile"><?php echo $mu2[1] ?></td><td class="succeed"><?php echo $mu2[3] ?></td><td class="succeed1"><?php echo $mu2[5] ?></td><td class="msucceed"><?php echo $mobilegoal-$mu2[5] ?></td></tr>
                            <tr><td class="team1">무선3</td><td class="it"><?php echo $mu3[0] ?></td><td class="mobile"><?php echo $mu3[1] ?></td><td class="succeed"><?php echo $mu3[3] ?></td><td class="succeed1"><?php echo $mu3[5] ?></td><td class="msucceed"><?php echo $mobilegoal-$mu3[5] ?></td></tr>
                            <tr><td class="team1">무선4</td><td class="it"><?php echo $mu4[0] ?></td><td class="mobile"><?php echo $mu4[1] ?></td><td class="succeed"><?php echo $mu4[3] ?></td><td class="succeed1"><?php echo $mu4[5] ?></td><td class="msucceed"><?php echo $mobilegoal-$mu4[5] ?></td></tr>
                            <tr><td class="team1">통품</td><td class="it"><?php echo $tong[0] ?></td><td class="mobile"><?php echo $tong[1] ?></td><td class="succeed"><?php echo $tong[3] ?></td><td class="succeed1"><?php echo $tong[5] ?></td><td class="msucceed"><?php echo $mobilegoal-$tong[5] ?></td></tr>
                        </tbody>
                        <tfoot>
                            <tr><td>합계</td><td id="it_t"></td><td id="mobile_t"></td><td id="succeed_t"></td><td id="succeed1_t"></td><td id="msucceed_t"></td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div id="timebox">
                <button class="tabcopy">표 복사</button>
                <h5>입력시간</h5>
                <p class="teamcom">무1: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu1[6] ?></span></p>
                <p class="teamcom">무2: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu2[6] ?></span></p>
                <p class="teamcom">무3: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu3[6] ?></span></p>
                <p class="teamcom">무4: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu4[6] ?></span></p>
                <p class="teamcom">통품: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $tong[6] ?></span></p>
            </div>
        </div>

        <div class="input-section">
            <form id="endinsert.php" action="endinsert.php" method="post">
                <fieldset>
                    <select name="teamname" id="select">
                        <option value="">팀 선택</option>
                        <option value="무1">무선1팀</option>
                        <option value="무2">무선2팀</option>
                        <option value="무3">무선3팀</option>
                        <option value="무4">무선4팀</option>
                        <option value="통품">통화품질팀</option>
                    </select>
                    
                    <div class="input-group">
                        <label>인티</label> <input id="itnet" class="inputnum" type="number" value=0 name="it">
                    </div>
                    <div class="input-group">
                        <label>모바일</label> <input id="mobile" class="inputnum" type="number" value=0 name="mobile">
                    </div>
                    <div class="input-group">
                        <label>가설</label> <input id="success" class="inputnum" type="number" value=0 name="success">
                    </div>
                    <div class="input-group">
                        <label>M유치</label> <input id="success1" class="inputnum" type="number" value=0 name="success1">
                    </div>
                    
                    <input id="nowtime" type="hidden" value="<?php echo date('d일H:i:s').$days[$weekday];?>" name="nowtime">
                    <button class="button1">실적전송</button> 
                </fieldset> 
            </form>
        </div>

    </div>

    <script>
        function sum($class){
            var sumend = [];
            $('.'+$class).each(function(idx,ele){
                var $thisnum = Number(ele.textContent);  
                sumend.push($thisnum); 
            });
            var sumresul = sumend.reduce((acc,curval)=>{ return acc+curval; },0)
            $('#'+$class+'_t').text(sumresul);     
        }
        sum('it'); sum('mobile'); sum('trigger'); sum('succeed');sum('succeednew'); sum('succeed1');sum('msucceed');

        $('.tabcopy').click(function(){ $lib.rangecopy('#tablecopy'); })
        $('.button1').click(function(e){
            if($('#select').val() !== ""){ $('#endinsert.php').submit(); }
            else { alert('팀 선택 필수!'); e.preventDefault(); }
        })
        $('.button2').click(function(e){
            if($('#select1').val() !== ""){ $('#boaninsert.php').submit(); }
            else { alert('팀 선택 필수!'); e.preventDefault(); }
        })

        $('.button3').click(function(e){
            if($('#noticeteam').val() !== ""){ $('#noticeinsert').submit(); }
            else { alert('팀 선택 필수!'); e.preventDefault(); }
        })

        $('.colordiv').each(function(idx,ele){
            var eleval = ele.textContent;
            var lastkey = eleval.slice(-1);
            var this_data = $(this).attr('data-col');
            if(lastkey == this_data){ $(this).css('background-color','#2563eb').css('color','white'); }
        })
        
        const jaweekday = <?php echo json_encode($days[$weekday]); ?>;
        
        $('.boancom').each(function(idx,ele){
            const excute1 = $(this).text().match(/\((.*?)\)/);
            const excute = excute1 ? excute1[1] : '';
            console.log(excute);
            if(excute == jaweekday){ $(this).parent().css('background-color','#d8e438').css('border-color','#bbf7d0'); }
        });

        $('.msucceed').each(function(idx,ele){
            const msucceednum = Number($(this).text());
            if(msucceednum > 0){
                $(this).css({'color':'red','font-weight':'bold'});
            }else{
                 $(this).append('<span>👍</span>');
            }
        });
        if( Number( $('#msucceed_t').text()  ) < 0 ){
            $('#msucceed_t').append('<span>😊</span>');
        } else{
           $('#msucceed_t').append('<span>😒</span>');
        }

       // 보안점검 일괄 등록 버튼 클릭 이벤트
        $('#bulkBoan').click(function() {
        if(confirm("모든 팀의 보안 점검 결과를 '이상 무'로 일괄 등록하시겠습니까?")) {
            // 별도의 처리 페이지로 이동하거나 AJAX를 사용할 수 있습니다.
            // 여기서는 요청하신 로직에 맞춰 폼 전송 방식과 유사하게 처리 페이지로 보냅니다.
            location.href = 'boanall.php';
        }
    });
    </script>
</body>
</html>