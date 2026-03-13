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
        body { font-family: 'Pretendard', -apple-system, sans-serif; background-color: #f1f5f9; margin: 0; padding: 15px; color: #334155; }
        
        /* 제목 영역 - 중앙 정렬 및 여백 최적화 */
        .main-header { text-align: center; margin-bottom: 20px; }
        .main-header h2 { margin: 0; color: #0f172a; font-size: 1.5rem; letter-spacing: -0.05rem; }

        /* 전체 컨테이너 가로폭 확장 */
        .main-wrapper { max-width: 100%; margin: 0 auto; display: flex; flex-direction: column; gap: 15px; }

        /* 상단 섹션: 실적표 | 시간 | 보안점검 (3분할 가로형) */
        .display-section { display: flex; gap: 15px; width: 100%; }
        
        .card { background: #fff; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
        
        #tablecopy { flex: 2; } /* 실적표를 가장 크게 */
        #timebox { flex: 0.5; min-width: 150px; }
        #boanBox { flex: 1.5; }

        h4 { margin: 0 0 12px 0; font-size: 1rem; color: #1e293b; display: flex; align-items: center; gap: 8px; }

        /* 테이블 디자인 고도화 */
        table { border-collapse: collapse; width: 100%; font-size: 0.85rem; border-radius: 8px; overflow: hidden; }
        thead td { background-color: #1e293b; color: #f8fafc; padding: 10px; font-weight: 600; }
        td { border-bottom: 1px solid #f1f5f9; padding: 10px 5px; text-align: center; }
        .team1 { background-color: #f8fafc; font-weight: bold; color: #475569; }
        tfoot td { background-color: #f8fafc; font-weight: 800; color: #2563eb; border-top: 2px solid #e2e8f0; }

        /* 버튼 및 입력 요소 커스텀 */
        .tabcopy { background-color: #3b82f6; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; cursor: pointer; transition: 0.2s; width: 100%; margin-bottom: 15px; font-weight: 600; }
        .tabcopy:hover { background-color: #2563eb; }

        .teamcom { font-size: 0.85rem; padding: 8px; border-radius: 6px; background: #f8fafc; margin: 5px 0; border: 1px solid #f1f5f9; }
        .colordiv { padding: 2px 6px; border-radius: 4px; font-weight: bold; }

        .chgcolor { padding: 10px; border: 1px solid #e2e8f0; border-radius: 8px; margin-bottom: 8px; font-size: 0.85rem; background: #fff; transition: 0.3s; }

        /* 하단 입력바: 화면 하단에 고정하거나 넓게 배치 */
        .input-section { 
            display: flex; flex-wrap: wrap; gap: 15px; background: #1e293b; padding: 15px; 
            border-radius: 12px; color: white; align-items: center; justify-content: center;
        }
        fieldset { border: none; padding: 0; margin: 0; display: flex; align-items: center; gap: 10px; }
        label { font-size: 0.75rem; font-weight: 500; color: #94a3b8; }
        
        select, input { padding: 8px; border: 1px solid #334155; border-radius: 6px; background: #f8fafc; font-size: 0.85rem; outline: none; }
        input[type="number"] { width: 55px; }
        .button1, .button2, .button3, .button4 { padding: 8px 16px; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; transition: 0.2s; }
        .button1 { background: #10b981; color: white; } /* 초록 */
        .button2 { background: #6366f1; color: white; } /* 보라 */

        /* 공지사항 하단 영역 가로 배치 */
        .sub-wrapper { display: flex; gap: 15px; width: 100%; min-height: 400px; }
        .noticeinput { flex: 1; display: flex; flex-direction: column; }
        .noticeview { flex: 3; max-height: 600px; overflow-y: auto; }

        .notice-card { background: white; border: 1px solid #e2e8f0; padding: 15px; margin-bottom: 12px; border-radius: 10px; position: relative; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .notice-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding-bottom: 8px; border-bottom: 1px dashed #e2e8f0; font-size: 0.8rem; }
        .team-badge { background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 20px; font-weight: 700; border: 1px solid #dbeafe; }
        .notice-body { font-size: 0.9rem; line-height: 1.5; color: #334155; white-space: pre-wrap; }
        
        textarea { width: 100%; height: 120px; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px; box-sizing: border-box; font-family: inherit; resize: none; margin-bottom: 10px; }
        
        .boancom { display: none; }
    </style>

    <title>CS1센터 Sales일실적</title>
</head>

<body>
    <div class="main-header">
        <h2>서울중앙 CS1센터 일 실적 및 보안 점검 창</h2>
        <a href="../../center2/today_end_sales/index.php" style="position:absolute; right:14rem; top:20px; background:#2563eb; color:white; padding:6px 12px; border-radius:6px; font-size:0.8rem;">2센터 실적창 이동</a>  
        <a href="../../center2/monthSales/index.php" style="position:absolute; right:20px; top:20px; background:#2563eb; color:white; padding:6px 12px; border-radius:6px; font-size:0.8rem;">1,2센터 누적개통 실적창 이동</a>
    </div>

    <div class="main-wrapper">
        <div class="display-section">
            <div id="tablecopy" class="card">
                <h4>📊 <?php echo date("m/d").'('.$days[$weekday].')'; ?> 팀별 실적 현황</h4>
                <table>
                    <thead>
                        <tr><td>구분</td><td>인티</td><td>모바일</td><td>가설(권)</td><td>가설(문)</td><td>M유치</td></tr>
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
            
            <div id="timebox" class="card">
                <button class="tabcopy">📋 실적표 복사</button>
                <h4>🕒 입력시간</h4>
                <p class="teamcom">유1: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu1[5] ?></span></p>
                <p class="teamcom">유2: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu2[5] ?></span></p>
            </div>
            
            <div id="boanBox" class="card">
                <h4>🛡️ 보안점검 결과</h4>
                <div class="chgcolor" id="bteam1"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam1[1]."</span> ".$boteam1[1]." 유1 ".$boteam1[0] ?></div>
                <div class="chgcolor" id="bteam2"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam2[1]."</span> ".$boteam2[1]." 유2 ".$boteam2[0] ?></div>
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
                    <label>인티</label> <input id="itnet" type="number" value=0 name="it">
                    <label>모바일</label> <input id="mobile" type="number" value=0 name="mobile">
                    <label>가설(권)</label> <input id="success" type="number" value=0 name="success">
                    <label>가설(문)</label> <input id="successnew" type="number" value=0 name="successnew">
                    <label>M유치</label> <input id="success1" type="number" value=0 name="success1">
                    <input id="nowtime" type="hidden" value="<?php echo date('d일H:i:s').$days[$weekday];?>" name="nowtime">
                    <button class="button1">📈 실적전송</button> 
                </fieldset> 
            </form>

            <div style="border-left: 1px solid #475569; height: 30px;"></div>

            <form id="boaninsert" action="boaninsert.php" method="post">
                <fieldset>
                    <select name="teamname1" id="select1">
                        <option value="">팀 선택</option>
                        <option value="유1">유선1팀</option>
                        <option value="유2">유선2팀</option>
                   </select>
                    <input id="boancheck" placeholder="이상 무 (보안점검 내용)" type="text" name="boancheck" style="width:180px;">
                    <input id="nowtime1" type="hidden" value="<?php echo date('m월/d일').'('.$days[$weekday].')'.' 18시';?>" name="nowtime1">
                    <button class="button2">🛡️ 보안전송</button> 
                </fieldset> 
            </form>
        </div>

        <div class="sub-wrapper">
            <div class="noticeinput card">
                <h4>📝 공지사항 입력</h4>
                <form id="noticeinsert" action="noticeinsert.php" method="post">
                    <select id="noticeteam" name="noticeteam" style="width:100%; margin-bottom:10px;">
                        <option value="">대상 선택</option>
                        <option value="센터장님">센터장님</option>
                        <option value="유1">유선1팀</option>
                        <option value="유2">유선2팀</option>
                    </select>
                    <textarea name="noticecontent" placeholder="공지할 내용을 입력하세요..."></textarea>
                    <input id="regtime" type="hidden" value="<?php echo date('m월 d일H:i:s');?>" name="regtime">
                    <button type="submit" class="button1 button3" style="width:100%; background:#2563eb;">공지 발송</button>
                </form>
                
                <hr style="width:100%; margin: 20px 0; border: 0; border-top: 1px solid #eee;">
                
                <form id="noticedel" action="noticedel.php" method="post">
                    <div style="display:flex; gap:5px;">
                        <input type="number" id="noticenum" placeholder="삭제 ID" name="id" style="flex:1;">
                        <button type="submit" class="button4" style="background:#ef4444; color:white;">삭제</button>
                    </div>
                </form>
            </div>

            <div class="noticeview card">
                <h4>📢 실시간 공지 현황</h4>
                <?php
                if (mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $team = htmlspecialchars($row1['teamname']);
                        $date = htmlspecialchars($row1['regiday']);
                        $content = nl2br(htmlspecialchars($row1['noticon']));
                        $id = $row1['id'];
                        ?>
                        <div class="notice-card">
                            <div class="notice-header">
                                <span><span class="team-badge"><?php echo $team; ?></span> <small style="color:#94a3b8; margin-left:5px;">ID: <?php echo $id; ?></small></span>
                                <span style="color:#94a3b8;"><?php echo $date; ?></span>
                            </div>
                            <div class="notice-body"><?php echo $content; ?></div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p style='text-align:center; padding:50px; color:#94a3b8;'>등록된 공지사항이 없습니다.</p>";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <script>
        // 기존 스크립트 기능 그대로 유지
        function sum($class){
            var sumend = [];
            $('.'+$class).each(function(idx,ele){
                var $thisnum = Number(ele.textContent);  
                sumend.push($thisnum); 
            });
            var sumresul = sumend.reduce((acc,curval)=>{ return acc+curval; },0)
            $('#'+$class+'_t').text(sumresul);     
        }
        sum('it'); sum('mobile');  sum('succeed');sum('succeednew'); sum('succeed1');

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