<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php');

// ... (기본 PHP 로직 유지) ...
$teams = ['유1', '유2'];
$teamData = [];
$teamboan = [];
foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT it_tend , m_end , success_end , successnew , success_end1, todaytime FROM c1sales_end WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['인티' => $row['it_tend'], '모바일' => $row['m_end'],'가설' => $row['success_end'] , '가설문' => $row['successnew'],'가설2' => $row['success_end1'],'시간' => $row['todaytime']];
    }
}

foreach($teams as $team){
    $sqlboan = "SELECT * FROM dailyboan2 WHERE teamname = '$team'";
    $reboan = mysqli_query($conn, $sqlboan);
    while ($rowboan = mysqli_fetch_array($reboan)) {
        $teamboan[$team][] = ['보안점검' => $rowboan['boanresult'], '시간' => $rowboan['inputday']];
    }
}

$mu1 = [$teamData['유1'][0]['인티'], $teamData['유1'][0]['모바일'], $teamData['유1'][0]['가설'],$teamData['유1'][0]['가설문'],$teamData['유1'][0]['가설2'],$teamData['유1'][0]['시간']];
$mu2 = [$teamData['유2'][0]['인티'], $teamData['유2'][0]['모바일'], $teamData['유2'][0]['가설'],$teamData['유2'][0]['가설문'],$teamData['유2'][0]['가설2'],$teamData['유2'][0]['시간']];


$boteam1 =[$teamboan['유1'][0]['보안점검'], $teamboan['유1'][0]['시간']];
$boteam2 =[$teamboan['유2'][0]['보안점검'], $teamboan['유2'][0]['시간']];


$weekday = date('l'); 
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"];

$sql1 = "SELECT id, teamname, regiday, noticon FROM cs1noti ORDER BY id DESC";
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
        /* 기본 레이아웃 최적화 */
        * { box-sizing: border-box; }
        body { font-family: 'Pretendard', -apple-system, sans-serif; background-color: #f1f5f9; margin: 0; padding: 10px; color: #334155; }
        
        /* 제목 영역 - 중앙 정렬 및 여백 최적화 (모바일/PC 반응형) */
        .main-header { display: flex; flex-direction: column; gap: 10px; text-align: center; margin-bottom: 15px; }
        .main-header h2 { margin: 0; color: #0f172a; font-size: 1.2rem; letter-spacing: -0.05rem; word-break: keep-all; line-height: 1.4; }
        
        .header-links { display: flex; flex-direction: column; gap: 6px; }
        .header-links a { background: #2563eb; color: white; padding: 10px; border-radius: 8px; font-size: 0.9rem; text-decoration: none; font-weight: bold; }

        /* 전체 컨테이너 */
        .main-wrapper { width: 100%; max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 15px; }

        /* 상단 섹션: 실적표 | 시간 (모바일에서 세로로 떨어지도록 수정) */
        .display-section { display: flex; flex-direction: column; gap: 15px; width: 100%; }
        
        .card { background: #fff; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); width: 100%; }
        
        h4 { margin: 0 0 12px 0; font-size: 1rem; color: #1e293b; display: flex; align-items: center; gap: 8px; }

        /* 테이블 디자인 고도화 및 모바일 가로 스크롤 허용 */
        .table-responsive { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 8px; }
        table { border-collapse: collapse; width: 100%; font-size: 0.85rem; min-width: 450px; /* 열 추가로 최소너비 살짝 증가 */ }
        thead td { background-color: #1e293b; color: #f8fafc; padding: 10px; font-weight: 600; white-space: nowrap; }
        td { border-bottom: 1px solid #f1f5f9; padding: 10px 5px; text-align: center; }
        .team1 { background-color: #f8fafc; font-weight: bold; color: #475569; white-space: nowrap; }
        tfoot td { background-color: #f8fafc; font-weight: 800; color: #2563eb; border-top: 2px solid #e2e8f0; }

        /* 버튼 및 텍스트 커스텀 */
        .tabcopy { background-color: #3b82f6; color: white; border: none; padding: 10px; border-radius: 8px; font-size: 0.9rem; cursor: pointer; transition: 0.2s; width: 100%; margin-bottom: 15px; font-weight: bold; }
        .tabcopy:hover { background-color: #2563eb; }

        .teamcom { font-size: 0.85rem; padding: 8px; border-radius: 6px; background: #f8fafc; margin: 5px 0; border: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;}
        .colordiv { padding: 2px 6px; border-radius: 4px; font-weight: bold; }

        /* 하단 입력바: 모바일 화면에 맞춰 줄바꿈(wrap)되도록 유연하게 배치 */
        .input-section { 
            display: flex; flex-direction: column; gap: 15px; background: #1e293b; padding: 15px; 
            border-radius: 12px; color: white; width: 100%;
        }
        form { width: 100%; }
        fieldset { border: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }
        
        .input-group { display: flex; align-items: center; gap: 6px; flex: 1 1 calc(33% - 10px); min-width: 100px; }
        .input-group label { font-size: 0.75rem; font-weight: 500; color: #94a3b8; white-space: nowrap; }
        
        select, input { padding: 10px; border: 1px solid #334155; border-radius: 6px; background: #f8fafc; font-size: 0.85rem; outline: none; }
        select { flex: 1 1 100%; min-width: 150px; }
        input[type="number"] { flex: 1; width: auto; min-width: 0; text-align: center; }
        
        .button1 { flex: 1 1 100%; padding: 12px; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; background: #10b981; color: white; margin-top: 5px; font-size: 1rem; transition: 0.2s; }
        .divider { display: none; } /* 모바일에서는 구분선 숨김 */

        .boancom { display: none; }

        /* 데스크톱(PC) 모드 적용 */
        @media (min-width: 768px) {
            .main-header { flex-direction: row; justify-content: space-between; align-items: center; text-align: left; padding: 0 10px; }
            .header-links { flex-direction: row; }
            .display-section { flex-direction: row; align-items: flex-start; }
            #tablecopy { flex: 2; } 
            #timebox { flex: 0.5; min-width: 200px; }
            
            fieldset { flex-wrap: nowrap; }
            select { flex: 0 0 auto; min-width: 100px; }
            .button1 { flex: 0 0 auto; margin-top: 0; }
            .divider { display: block; border-left: 1px solid #475569; height: 30px; margin: 0 10px; }
        }
    </style>

    <title>CS1센터 Sales일실적</title>
</head>

<body>
    <div class="main-header">
        <h2>서울중앙 CS센터(유선) 일 실적 및 보안 점검 창</h2>
        <div class="header-links">
            <a href="../../center2/today_end_sales/index_old.php">CS(무선)일 실적 이동</a>  
            <a href="../../center2/monthSales/index_old.php">CS(유,무선) 누적개통 실적 이동</a>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="display-section">
            <div id="tablecopy" class="card">
                <h4>📊 <?php echo date("m/d").'('.$days[$weekday].')'; ?> 팀별 실적 현황</h4>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr><td>구분</td><td>인티</td><td>모바일</td><td>IT가설</td><td>IT문의가설</td><td>M유치</td></tr>
                        </thead>
                        <tbody>
                            <tr><td class="team1">유선1</td><td class="it"><?php echo $mu1[0] ?></td><td class="mobile"><?php echo $mu1[1] ?></td><td class="succeed"><?php echo $mu1[2] ?></td><td class="succeednew"><?php echo $mu1[3] ?></td><td class="succeed1"><?php echo $mu1[4] ?></td></tr>
                            <tr><td class="team1">유선2</td><td class="it"><?php echo $mu2[0] ?></td><td class="mobile"><?php echo $mu2[1] ?></td><td class="succeed"><?php echo $mu2[2] ?></td><td class="succeednew"><?php echo $mu2[3] ?></td><td class="succeed1"><?php echo $mu2[4] ?></td></tr>
                        </tbody>
                        <tfoot>
                            <tr><td>합계</td><td id="it_t"></td><td id="mobile_t"></td><td id="succeed_t"></td><td id="succeednew_t"></td><td id="succeed1_t"></td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div id="timebox" class="card">
                <button class="tabcopy">📋 실적표 복사</button>
                <h4>🕒 입력시간</h4>
                <p class="teamcom">유1: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu1[5] ?></span></p>
                <p class="teamcom">유2: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu2[5] ?></span></p>
            </div>
        </div>

        <div class="input-section">
            <form id="endinsert.php" action="endinsert.php" method="post">
                <fieldset>
                    <select name="teamname" id="select">
                        <option value="">팀 선택</option>
                        <option value="유1">유선1팀</option>
                        <option value="유2">유선2팀</option>
                    </select>
                    
                    <div class="input-group">
                        <label>인티</label> <input id="itnet" type="number" value=0 name="it">
                    </div>
                    <div class="input-group">
                        <label>모바일</label> <input id="mobile" type="number" value=0 name="mobile">
                    </div>
                    <div class="input-group">
                        <label>가설</label> <input id="success" type="number" value=0 name="success">
                    </div>
                    <!-- IT문의가설 항목 추가 -->
                    <div class="input-group">
                        <label>IT문의가설</label> <input id="successnew" type="number" value=0 name="successnew">
                    </div>
                    <div class="input-group">
                        <label>M유치</label> <input id="success1" type="number" value=0 name="success1">
                    </div>
                    
                    <input id="nowtime" type="hidden" value="<?php echo date('d일H:i:s').$days[$weekday];?>" name="nowtime">
                    <button class="button1">📈 실적전송</button> 
                </fieldset> 
            </form>
            <div class="divider"></div>
        </div>
    </div>

    <script>
        // 기존 스크립트 기능 그대로 유지 (succeednew 클래스를 찾아 자동 합산)
        function sum($class){
            var sumend = [];
            $('.'+$class).each(function(idx,ele){
                var $thisnum = Number(ele.textContent);  
                sumend.push($thisnum); 
            });
            var sumresul = sumend.reduce((acc,curval)=>{ return acc+curval; },0)
            $('#'+$class+'_t').text(sumresul);     
        }
        // succeednew 항목 합산이 정상 반영되도록 기존 함수 호출 유지
        sum('it'); sum('mobile'); sum('succeed'); sum('succeednew'); sum('succeed1');

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
            if(excute == jaweekday){ $(this).parent().css('background-color','#fef9c3').css('border-color','#facc15'); }
        });
    </script>
</body>
</html>