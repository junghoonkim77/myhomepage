<?php 
include ('phpgate.php');

$teams = ['무1', '무2', '무3', '무4', '무5', '통품'];
$teamData = [];
$teamboan = [];
foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT it_tend , m_end , tri_end , success_end , success_end1, todaytime FROM c2sales_end WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['인티' => $row['it_tend'], '모바일' => $row['m_end'], '통리' => $row['tri_end'], '가설' => $row['success_end'] ,'가설2' => $row['success_end1'],'시간' => $row['todaytime']];
    }
}

foreach($teams as $team){
    $sqlboan = "SELECT * FROM dailyboan WHERE teamname = '$team'";
    $reboan = mysqli_query($conn, $sqlboan);
    while ($rowboan = mysqli_fetch_array($reboan)) {
        $teamboan[$team][] = ['보안점검' => $rowboan['boanresult'], '시간' => $rowboan['inputday']];
    }
}

$mu1 = [$teamData['무1'][0]['인티'], $teamData['무1'][0]['모바일'], $teamData['무1'][0]['통리'], $teamData['무1'][0]['가설'],$teamData['무1'][0]['가설2'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['인티'], $teamData['무2'][0]['모바일'], $teamData['무2'][0]['통리'], $teamData['무2'][0]['가설'],$teamData['무2'][0]['가설2'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['인티'], $teamData['무3'][0]['모바일'], $teamData['무3'][0]['통리'], $teamData['무3'][0]['가설'],$teamData['무3'][0]['가설2'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['인티'], $teamData['무4'][0]['모바일'], $teamData['무4'][0]['통리'], $teamData['무4'][0]['가설'],$teamData['무4'][0]['가설2'],$teamData['무4'][0]['시간']];
$mu5 = [$teamData['무5'][0]['인티'], $teamData['무5'][0]['모바일'], $teamData['무5'][0]['통리'], $teamData['무5'][0]['가설'],$teamData['무5'][0]['가설2'],$teamData['무5'][0]['시간']];
$tong = [$teamData['통품'][0]['인티'], $teamData['통품'][0]['모바일'], $teamData['통품'][0]['통리'], $teamData['통품'][0]['가설'],$teamData['통품'][0]['가설2'],$teamData['통품'][0]['시간']];

$boteam1 =[$teamboan['무1'][0]['보안점검'], $teamboan['무1'][0]['시간']];
$boteam2 =[$teamboan['무2'][0]['보안점검'], $teamboan['무2'][0]['시간']];
$boteam3 =[$teamboan['무3'][0]['보안점검'], $teamboan['무3'][0]['시간']];
$boteam4 =[$teamboan['무4'][0]['보안점검'], $teamboan['무4'][0]['시간']];
$boteam5 =[$teamboan['무5'][0]['보안점검'], $teamboan['무5'][0]['시간']];
$botong =[$teamboan['통품'][0]['보안점검'], $teamboan['통품'][0]['시간']];

$weekday = date('l');
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS2센터 Sales 대시보드</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> 
    <script src="../../java/library.js"></script> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4e73df;
            --bg-color: #f8f9fc;
            --card-bg: #ffffff;
            --text-main: #3a3b45;
            --border-color: #e3e6f0;
            --accent-color: #36b9cc;
        }

        body {
            font-family: 'Noto Sans KR', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            margin: 0;
            padding: 20px;
        }

        .header {
            margin-bottom: 30px;
            text-align: center;
        }

        .header h2 {
            color: var(--primary-color);
            font-weight: 700;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* 카드 공통 스타일 */
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* 테이블 스타일 */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }

        thead th {
            background-color: #f1f4f9;
            padding: 12px;
            border-bottom: 2px solid var(--border-color);
        }

        tbody td {
            padding: 12px;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }

        .team1 { background-color: #fafbfc; font-weight: 500; }

        tfoot td {
            background-color: #f1f4f9;
            font-weight: 700;
            padding: 12px;
        }

        /* 입력 시간 섹션 */
        .time-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
            font-size: 0.9rem;
        }

        .colordiv {
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* 보안 점검 섹션 */
        .boan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .boan-card {
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.85rem;
            line-height: 1.6;
            transition: transform 0.2s;
        }

        .boan-card:hover { transform: translateY(-3px); }

        /* 폼 스타일 */
        .form-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            max-width: 1400px;
            margin: 20px auto;
        }

        fieldset {
            border: none;
            padding: 0;
        }

        select, input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .button1, .button2, .tabcopy {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: opacity 0.2s;
            width: 100%;
        }

        .tabcopy { width: auto; background-color: var(--accent-color); }

        .button1:hover, .button2:hover, .tabcopy:hover { opacity: 0.8; }

        .boancom { display: none; }
        
        @media (max-width: 1024px) {
            .main-grid, .form-section { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="header">
        <h2><?php echo date("m/d").'('.$days[$weekday].')'; ?> MIT 판매기회발굴 실적 대시보드</h2>
    </div>

    <div class="main-grid">
        <div class="card" id="tablecopy">
            <div class="card-title">
                판매 기회 발굴 실적
                <button class="tabcopy">표 복사하기</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>구분</th>
                        <th>인티</th>
                        <th>모바일</th>
                        <th>통리</th>
                        <th>IT 가설</th>
                        <th>M 유치</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $teamNames = ['무선1', '무선2', '무선3', '무선4', '무선5', '통화품질'];
                    $teamVars = [$mu1, $mu2, $mu3, $mu4, $mu5, $tong];
                    for($i=0; $i<6; $i++): ?>
                    <tr>
                        <td class="team1"><?php echo $teamNames[$i]; ?></td>
                        <td class="it"><?php echo $teamVars[$i][0] ?></td>
                        <td class="mobile"><?php echo $teamVars[$i][1] ?></td>
                        <td class="trigger"><?php echo $teamVars[$i][2] ?></td>
                        <td class="succeed"><?php echo $teamVars[$i][3] ?></td>
                        <td class="succeed1"><?php echo $teamVars[$i][4] ?></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>합계</td>
                        <td id="it_t"></td>
                        <td id="mobile_t"></td>
                        <td id="trigger_t"></td>
                        <td id="succeed_t"></td>
                        <td id="succeed1_t"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="card">
            <div class="card-title">Sales 입력 시간</div>
            <div class="time-list">
                <?php for($i=0; $i<6; $i++): ?>
                <div class="time-item">
                    <span><?php echo $teamNames[$i]; ?>팀</span>
                    <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $teamVars[$i][5] ?></span>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <div class="card" style="max-width: 1360px; margin: 0 auto;">
        <div class="card-title">CS2센터 일일보안점검 결과</div>
        <div class="boan-grid">
            <?php 
            $boanVars = [$boteam1, $boteam2, $boteam3, $boteam4, $boteam5, $botong];
            $boanNames = ['무선일반1팀', '무선일반2팀', '무선일반3팀', '무선일반4팀', '무선일반5팀', '통화품질팀'];
            for($i=0; $i<6; $i++): ?>
            <div class="boan-card chgcolor" id="bteam<?php echo $i+1; ?>">
                <strong>[점검]</strong> <span class="boancom"><?php echo $boanVars[$i][1] ?></span><br>
                <?php echo $boanVars[$i][1]." ".$boanNames[$i]." 보고"; ?><br>
                <span style="color: #666;"><?php echo $boanVars[$i][0] ?></span>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="form-section">
        <div class="card">
            <div class="card-title">실적 데이터 입력</div>
            <form id="endinsert.php" action="endinsert.php" method="post">
                <select name="teamname" id="select">
                    <option value="">본인팀 선택 필수</option>
                    <option value="무1">무선1팀(전영선)</option>
                    <option value="무2">무선2팀(박세민)</option>
                    <option value="무3">무선3팀(윤미연)</option>
                    <option value="무4">무선4팀(도창수)</option>
                    <option value="무5">무선5팀(최세희)</option>
                    <option value="통품">통화품질팀(김정훈)</option>
                </select>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div><label>인티</label><input class="inputnum" type="number" value="0" name="it"></div>
                    <div><label>모바일</label><input class="inputnum" type="number" value="0" name="mobile"></div>
                    <div><label>통리</label><input class="inputnum" type="number" value="0" name="trigger"></div>
                    <div><label>IT 가설</label><input class="inputnum" type="number" value="0" name="success"></div>
                    <div style="grid-column: span 2;"><label>M 유치</label><input class="inputnum" type="number" value="0" name="success1"></div>
                </div>
                <input type="hidden" value="<?php echo date('d일H:i:s').$days[$weekday];?>" name="nowtime">
                <button class="button1" type="button">실적 데이터 전송</button>
            </form>
        </div>

        <div class="card">
            <div class="card-title">보안 점검 결과 입력</div>
            <form id="boaninsert" action="boaninsert.php" method="post">
                <select name="teamname1" id="select1">
                    <option value="">본인팀 선택 필수</option>
                    <option value="무1">무선1팀(전영선)</option>
                    <option value="무2">무선2팀(박세민)</option>
                    <option value="무3">무선3팀(윤미연)</option>
                    <option value="무4">무선4팀(도창수)</option>
                    <option value="무5">무선5팀(최세희)</option>
                    <option value="통품">통화품질팀(김정훈)</option>
                </select>
                <label>보안점검결과 상세</label>
                <input id="boancheck" placeholder="이상 무 / 검출내용(파일명) 0건 조치결과" type="text" name="boancheck">
                <input type="hidden" value="<?php echo date('m월/d일').'('.$days[$weekday].')'.' 18시';?>" name="nowtime1">
                <button class="button2" type="button" style="margin-top: 20px;">보안 점검 결과 전송</button>
            </form>
        </div>
    </div>

    <script>
        // 기존 sum 함수 로직 유지
        function sum($class){
            var sumend = [];
            $('.'+$class).each(function(idx,ele){
                var $thisnum = Number(ele.textContent);  
                sumend.push($thisnum); 
            });
            var sumresul = sumend.reduce((acc,curval)=>{
                return acc+curval;
            },0)
            $('#'+$class+'_t').text(sumresul);     
        }

        sum('it'); sum('mobile'); sum('trigger'); sum('succeed'); sum('succeed1');

        $('.tabcopy').click(function(){
            $lib.rangecopy('#tablecopy');
        });
        
        $('.button1').click(function(e){
            if($('#select').val() !== ""){
                $('#endinsert\\.php').submit(); // ID에 온점이 포함된 경우 역슬래시 처리
            }else{
                alert('팀명을 선택하세요~!');
            }
        });

        $('.button2').click(function(e){
            if($('#select1').val() !== ""){
                $('#boaninsert').submit();
            }else{
                alert('팀명을 선택하세요~!');
            }
        });

        $('.colordiv').each(function(idx,ele){
            var eleval = ele.textContent;
            var lastkey = eleval.slice(-1);
            var this_data = $(this).attr('data-col');
            if(lastkey == this_data){
                $(this).css('background-color','#00f2fe').css('color', '#000');
            }
        });
            
        const jaweekday = <?php echo json_encode($days[$weekday]); ?>;
        $('.boancom').each(function(idx,ele){
            const excute = $(this).text().slice(-2,-1);
            if(excute == jaweekday){
                $(this).parent().css('background-color','#e0f7fa').css('border-color', '#4dd0e1');
            }
        });
    </script>
</body>
</html>