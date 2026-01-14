<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php');

// ... (기본 PHP 로직 유지) ...
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
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> 
    <script src="../../java/library.js"></script> 

    <style>
        body { font-family: 'Pretendard', sans-serif; background-color: #f4f7fa; margin: 0; padding: 10px; }
        h3, h4, h5 { margin: 0 0 8px 0; color: #1e293b; font-size: 0.9rem; }

        .main-wrapper { display: flex; flex-direction: column; gap: 8px; max-width: 1300px; margin: 0 auto; }

        /* 표시 영역 레이아웃 */
        .display-section { display: flex; flex-direction: row; gap: 8px; align-items: stretch; }

        /* 섹션별 너비 조정 (더욱 축소) */
        #tablecopy { flex: 0 0 420px; background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0; }
        #timebox { flex: 0 0 140px; background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0; }
        #boanBox { flex: 1; background: #fff; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0; }

        /* 테이블 콤팩트화 */
        table { border-collapse: collapse; width: 100%; font-size: 0.8rem; }
        thead td { background-color: #1e293b; color: white; padding: 5px; text-align: center; }
        td { border-bottom: 1px solid #e2e8f0; padding: 5px 2px; text-align: center; }
        .team1 { background-color: #f8fafc; font-weight: bold; text-align: left; padding-left: 5px; width: 60px; }
        tfoot td { background-color: #f1f5f9; font-weight: 800; color: #2563eb; }

        /* 입력 시간/보안결과 텍스트 축소 */
        .tabcopy { background-color: #2563eb; color: white; border: none; padding: 3px 8px; border-radius: 4px; font-size: 0.75rem; cursor: pointer; margin-bottom: 8px; }
        .teamcom { font-size: 0.75rem; margin: 3px 0; padding-bottom: 2px; border-bottom: 1px dashed #e2e8f0; white-space: nowrap; }
        #boanBox div { padding: 4px 8px; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 4px; font-size: 0.75rem; line-height: 1.2; }

        /* 하단 입력창: 절대 줄바꿈 금지 */
        .input-section { 
            display: flex; flex-direction: row; gap: 10px; background: #fff; padding: 10px; 
            border-radius: 10px; border: 1px solid #e2e8f0; align-items: center; overflow-x: auto; 
        }
        form { margin: 0; padding: 0; flex-shrink: 0; }
        fieldset { border: none; padding: 0; margin: 0; display: flex; align-items: center; gap: 5px; white-space: nowrap; }
        
        select, input[type="number"], input[type="text"] { padding: 5px; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 0.8rem; }
        input[type="number"] { width: 35px; } /* 숫자 입력창 더 축소 */
        label { font-size: 0.75rem; font-weight: 600; color: #64748b; margin-left: 2px; }

        .button1, .button2 { 
            background-color: #0f172a; color: white; border: none; padding: 5px 10px; 
            border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 0.8rem; flex-shrink: 0;
        }

        .boancom { display: none; }
    </style>

    <title>CS2센터 Sales일실적</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="display-section">
            <div id="tablecopy">
                <h4><?php echo date("m/d").'('.$days[$weekday].') 실적'; ?></h4>
                <table>
                    <thead>
                        <tr><td>구분</td><td>인티</td><td>모바일</td><td>통리</td><td>가설</td><td>M유치</td></tr>
                    </thead>
                    <tbody>
                        <tr><td class="team1">무선1</td><td class="it"><?php echo $mu1[0] ?></td><td class="mobile"><?php echo $mu1[1] ?></td><td class="trigger"><?php echo $mu1[2] ?></td><td class="succeed"><?php echo $mu1[3] ?></td><td class="succeed1"><?php echo $mu1[4] ?></td></tr>
                        <tr><td class="team1">무선2</td><td class="it"><?php echo $mu2[0] ?></td><td class="mobile"><?php echo $mu2[1] ?></td><td class="trigger"><?php echo $mu2[2] ?></td><td class="succeed"><?php echo $mu2[3] ?></td><td class="succeed1"><?php echo $mu2[4] ?></td></tr>
                        <tr><td class="team1">무선3</td><td class="it"><?php echo $mu3[0] ?></td><td class="mobile"><?php echo $mu3[1] ?></td><td class="trigger"><?php echo $mu3[2] ?></td><td class="succeed"><?php echo $mu3[3] ?></td><td class="succeed1"><?php echo $mu3[4] ?></td></tr>
                        <tr><td class="team1">무선4</td><td class="it"><?php echo $mu4[0] ?></td><td class="mobile"><?php echo $mu4[1] ?></td><td class="trigger"><?php echo $mu4[2] ?></td><td class="succeed"><?php echo $mu4[3] ?></td><td class="succeed1"><?php echo $mu4[4] ?></td></tr>
                        <tr><td class="team1">무선5</td><td class="it"><?php echo $mu5[0] ?></td><td class="mobile"><?php echo $mu5[1] ?></td><td class="trigger"><?php echo $mu5[2] ?></td><td class="succeed"><?php echo $mu5[3] ?></td><td class="succeed1"><?php echo $mu5[4] ?></td></tr>
                        <tr><td class="team1">통품</td><td class="it"><?php echo $tong[0] ?></td><td class="mobile"><?php echo $tong[1] ?></td><td class="trigger"><?php echo $tong[2] ?></td><td class="succeed"><?php echo $tong[3] ?></td><td class="succeed1"><?php echo $tong[4] ?></td></tr>
                    </tbody>
                    <tfoot>
                        <tr><td>합계</td><td id="it_t"></td><td id="mobile_t"></td><td id="trigger_t"></td><td id="succeed_t"></td><td id="succeed1_t"></td></tr>
                    </tfoot>
                </table>
            </div>
            
            <div id="timebox">
                <button class="tabcopy">표 복사</button>
                <h5>입력시간</h5>
                <p class="teamcom">무1: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu1[5] ?></span></p>
                <p class="teamcom">무2: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu2[5] ?></span></p>
                <p class="teamcom">무3: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu3[5] ?></span></p>
                <p class="teamcom">무4: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu4[5] ?></span></p>
                <p class="teamcom">무5: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $mu5[5] ?></span></p>
                <p class="teamcom">통품: <span class="colordiv" data-col="<?php echo $days[$weekday]; ?>"><?php echo $tong[5] ?></span></p>
            </div>
            
            <div id="boanBox">
                <h3>보안점검 결과</h3>
                <div class="chgcolor" id="bteam1"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam1[1]."</span> ".$boteam1[1]." 무1 ".$boteam1[0] ?></div>
                <div class="chgcolor" id="bteam2"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam2[1]."</span> ".$boteam2[1]." 무2 ".$boteam2[0] ?></div>
                <div class="chgcolor" id="bteam3"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam3[1]."</span> ".$boteam3[1]." 무3 ".$boteam3[0] ?></div>
                <div class="chgcolor" id="bteam4"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam4[1]."</span> ".$boteam4[1]." 무4 ".$boteam4[0] ?></div>
                <div class="chgcolor" id="bteam5"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$boteam5[1]."</span> ".$boteam5[1]." 무5 ".$boteam5[0] ?></div>
                <div class="chgcolor" id="bteam6"><?php echo "<strong>[점검]</strong><span class=\"boancom\">".$botong[1]."</span> ".$botong[1]." 통품 ".$botong[0] ?></div>
            </div>
        </div>

        <div class="input-section">
            <form id="endinsert.php" action="endinsert.php" method="post">
                <fieldset>
                    <select name="teamname" id="select" style="width:100px;">
                        <option value="">팀 선택</option>
                        <option value="무1">무선1팀</option>
                        <option value="무2">무선2팀</option>
                        <option value="무3">무선3팀</option>
                        <option value="무4">무선4팀</option>
                        <option value="무5">무선5팀</option>
                        <option value="통품">통화품질팀</option>
                    </select>
                    <label>인티</label> <input id="itnet" class="inputnum" type="number" value=0 name="it">
                    <label>모바일</label> <input id="mobile" class="inputnum" type="number" value=0 name="mobile">
                    <label>통리</label> <input id="trigger" class="inputnum" type="number" value=0 name="trigger">
                    <label>가설</label> <input id="success" class="inputnum" type="number" value=0 name="success">
                    <label>M유치</label> <input id="success1" class="inputnum" type="number" value=0 name="success1">
                    <input id="nowtime" type="hidden" value="<?php echo date('d일H:i:s').$days[$weekday];?>" name="nowtime">
                    <button class="button1">실적전송</button> 
                </fieldset> 
            </form>

            <div style="border-left: 1px solid #e2e8f0; height: 30px; margin: 0 5px;"></div>

            <form id="boaninsert" action="boaninsert.php" method="post">
                <fieldset>
                    <select name="teamname1" id="select1" style="width:100px;">
                        <option value="">팀 선택</option>
                        <option value="무1">무선1팀</option>
                        <option value="무2">무선2팀</option>
                        <option value="무3">무선3팀</option>
                        <option value="무4">무선4팀</option>
                        <option value="무5">무선5팀</option>
                        <option value="통품">통화품질팀</option>
                    </select>
                    <input id="boancheck" class="boancheck" placeholder="이상 무" type="text" name="boancheck" style="width:140px;">
                    <input id="nowtime1" type="hidden" value="<?php echo date('m월/d일').'('.$days[$weekday].')'.' 18시';?>" name="nowtime1">
                    <button class="button2">보안전송</button> 
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
        sum('it'); sum('mobile'); sum('trigger'); sum('succeed'); sum('succeed1');

        $('.tabcopy').click(function(){ $lib.rangecopy('#tablecopy'); })
        $('.button1').click(function(e){
            if($('#select').val() !== ""){ $('#endinsert.php').submit(); }
            else { alert('팀 선택 필수!'); e.preventDefault(); }
        })
        $('.button2').click(function(e){
            if($('#select1').val() !== ""){ $('#boaninsert.php').submit(); }
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
    </script>
</body>
</html>