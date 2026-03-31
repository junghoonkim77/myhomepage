<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php'); 

$teams = ['무1', '무2', '무3', '무4', '무5', '통품','유1','유2']; 
$teamData = [];
foreach ($teams as $team) {
    $teamData[$team] = [];
    // 컬럼명 절대 고정: it_success(문의), newit_itsuccess(권유)
    $sql = "SELECT m_goal , m_success , it_goal , it_success, newit_itsuccess , todaytime FROM c2sales_month WHERE teamname = '$team'"; 
    $re = mysqli_query($conn, $sql); 
    if (!$re) {
        die("쿼리 실행 에러: " . mysqli_error($conn) . " (에러 난 SQL: $sql)"); 
    }

    while ($row = mysqli_fetch_array($re)) { 
        $teamData[$team][] = [
            '모목' => $row['m_goal'], 
            '모개' => $row['m_success'], 
            '인티목' => $row['it_goal'], 
            '인티문의' => $row['it_success'], 
            '인티권유' => $row['newit_itsuccess'], 
            '시간' => $row['todaytime']
        ]; 
    }
}

// 각 팀별 데이터 변수 할당
$mu1 = $teamData['무1'][0]; $mu2 = $teamData['무2'][0]; $mu3 = $teamData['무3'][0]; 
$mu4 = $teamData['무4'][0]; $mu5 = $teamData['무5'][0]; $tong = $teamData['통품'][0]; 
$wire1 = $teamData['유1'][0]; $wire2 = $teamData['유2'][0]; 

$weekday = date('l'); 
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"]; 
$year = date('Y'); $month = date('m'); $today = date('Y-m-d'); 
$my_holidays = ['2026-03-02','2026-05-05','2026-05-01','2026-05-25','2026-06-03','2026-08-17','2026-09-24','2026-09-25',
'2026-10-05','2026-10-09','2026-12-25']; 
$last_day = date('t', mktime(0, 0, 0, $month, 1, $year)); 
$total_working_days = 0; $remaining_days = 0;

for ($day = 1; $day <= $last_day; $day++) { 
    $date_string = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    $day_of_week = date('N', strtotime($date_string)); 
    if ($day_of_week < 6 && !in_array($date_string, $my_holidays)) { 
        $total_working_days++; 
        if ($date_string >= $today) { $remaining_days++; } 
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="../../java/library.js"></script>
    <title>CS1/2센터 누적실적</title>
    <style type="text/css">
        body { font-family: 'Malgun Gothic', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; } 
        .headbox { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; text-align: center; } 
        #goal { font-weight: bold; font-size: 1.1rem; } 
        .totalworkingday { color: #007bff; } .remainworkingday { color: #dc3545; } 
        .container { display: flex; flex-direction: row; gap: 30px; justify-content: center; align-items: flex-start; } 
        .cs2centerdash, .cs1centerdash { flex: 1; min-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); } 
        h4 { border-left: 5px solid #333; padding-left: 10px; margin-bottom: 15px; } 
        .tg { border-collapse: collapse; width: 100%; margin-bottom: 25px; table-layout: fixed; } 
        .tg td, .tg th { border: 1px solid #ddd; padding: 10px 5px; text-align: center; font-size: 12px; } 
        .tg .tg-46o7 { background-color: #333; color: #fff; font-weight: bold; } 
        fieldset { border: 1px solid #eee; border-radius: 6px; padding: 15px; margin-bottom: 15px; background: #fafafa; } 
        .form-row { display: flex; align-items: center; margin-bottom: 10px; } 
        .form-row label { width: 110px; font-size: 12px; font-weight: bold; } 
        .form-row input, .form-row select { flex: 1; padding: 5px; border: 1px solid #ccc; border-radius: 4px; } 
        button { width: 100%; padding: 10px; background: #333; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; } 
        .total-row { background-color: #eee !important; font-weight: bold; } 
    </style>
</head>
<body>

<div class="headbox">
    <h3>CS1,2센터 <span><?php echo (int)$month; ?></span>월 누적 실적 현황</h3> 
    <div id="goal">
        <span data-totalwork="<?php echo $total_working_days; ?>" class="totalworkingday"><?php echo (int)$month."월 총 영업일: ".$total_working_days; ?>일</span> &nbsp;|&nbsp;
        <span data-remainwork="<?php echo $remaining_days; ?>" class="remainworkingday"><?php echo "잔여 영업일: ".$remaining_days; ?>일</span> &nbsp;|&nbsp;
        <span class="today"><?php echo "Today: ".date('Y-m-d'); ?></span>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="../today_end_sales/index.php" style="color:#007bff; text-decoration:none;">일일 실적마감창 이동</a> 
    </div>
</div>

<div class="container">
    <div class="cs2centerdash">
        <h4>CS2센터(무선) 누적 실적</h4>
        <button id="c2tablecopy" style="margin-bottom:10px; background:#007bff;">표 복사</button>
        <table class="tg" id="cs2table">
            <thead>
                <tr>
                    <th class="tg-46o7" rowspan="2" style="width:12%">팀</th>
                    <th class="tg-46o7" colspan="4">M가입기회발굴</th>
                    <th class="tg-46o7" colspan="6">IT가입기회발굴</th> 
                    <th class="tg-46o7" style="width:12%">입력일시</th>
                </tr>
                <tr>
                    <th class="tg-46o7">목표</th><th class="tg-46o7">개통</th><th class="tg-46o7">진도</th><th class="tg-46o7">달성</th>
                    <th class="tg-46o7">목표</th><th class="tg-46o7">문의</th><th class="tg-46o7">권유</th><th class="tg-46o7">합계</th><th class="tg-46o7">진도</th><th class="tg-46o7">달성</th>
                    <th class="tg-46o7">-</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $mu_teams = [['무선1팀', $mu1,'무1'], ['무선2팀', $mu2,'무2'], ['무선3팀', $mu3,'무3'], ['무선4팀', $mu4,'무4'], ['무선5팀', $mu5,'무5'], ['통화품질팀', $tong,'통품']]; 
                foreach($mu_teams as $t): ?>
                <tr <?php echo "id='".$t[2]."'"; ?>>
                    <td><?php echo $t[0]; ?></td>
                    <td class="mtarget"><?php echo $t[1]['모목']; ?></td>
                    <td class="msuccess"><?php echo $t[1]['모개']; ?></td>
                    <td class="mprogress"></td><td class="machieve"></td>
                    <td class="ittarget"><?php echo $t[1]['인티목']; ?></td>
                    <td class="itsuccess-q"><?php echo $t[1]['인티문의']; ?></td>
                    <td class="itsuccess-s"><?php echo $t[1]['인티권유']; ?></td>
                    <td class="itsuccess-total"></td> 
                    <td class="itprogress"></td><td class="itachieve"></td>
                    <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="font-size:11px"><?php echo $t[1]['시간']; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td>계</td>
                    <td class="mtargetTotal"></td><td class="msuccessTotal"></td><td class="mprogressTotal"></td><td class="machieveTotal"></td>
                    <td class="ittargetTotal"></td><td class="itqTotal"></td><td class="itsTotal"></td><td class="ittotalTotal"></td><td class="itprogressTotal"></td><td class="itachieveTotal"></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <form action="successInsert.php" method="post">
            <fieldset>
                <legend>무선팀 실적 입력</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" id="muTeamSelect" required>
                        <option value="">팀 선택</option>
                        <option value="무1">무선1</option><option value="무2">무선2</option><option value="무3">무선3</option>
                        <option value="무4">무선4</option><option value="무5">무선5</option><option value="통품">통품</option>
                    </select>
                </div>
                <div class="form-row"><label>M개통 누적</label><input type="number" id="Msuccess" name="Msuccess"></div>
                <div class="form-row"><label>IT문의 누적</label><input type="number" id="ITsuccess" name="ITsuccess"></div>
                <div class="form-row"><label>IT권유 누적</label><input type="number" id="newITsuccess" name="newITsuccess"></div>
                <input type="hidden" name="nowtime" value="<?php echo date('d일H:i:s').$days[$weekday]; ?>">
                <button type="submit">실적 제출</button>
            </fieldset>
        </form>

        <form action="goalinsert.php" method="post">
            <fieldset>
                <legend>무선팀 목표 설정</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" required>
                        <option value="">팀 선택</option>
                        <option value="무1">무선1</option><option value="무2">무선2</option><option value="무3">무선3</option>
                        <option value="무4">무선4</option><option value="무5">무선5</option><option value="통품">통품</option>
                    </select>
                </div>
                <div class="form-row"><label>M목표</label><input type="number" name="Mtarget"></div>
                <div class="form-row"><label>IT목표</label><input type="number" name="ITtarget"></div>
                <button type="submit" style="background:#555;">목표 제출</button>
            </fieldset>
        </form>
    </div>

    <div class="cs1centerdash">
        <h4>CS1센터(유선) 누적 실적</h4>
        <button id="c1tablecopy" style="margin-bottom:10px; background:#007bff;">표 복사</button>
        <table class="tg" id="cs1table">
            <thead>
                <tr>
                    <th class="tg-46o7" rowspan="2" style="width:12%">팀</th>
                    <th class="tg-46o7" colspan="4">M가입기회발굴</th>
                    <th class="tg-46o7" colspan="6">IT가입기회발굴</th>
                    <th class="tg-46o7" style="width:12%">입력일시</th>
                </tr>
                <tr>
                    <th class="tg-46o7">목표</th><th class="tg-46o7">이관</th><th class="tg-46o7">진도</th><th class="tg-46o7">달성</th>
                    <th class="tg-46o7">목표</th><th class="tg-46o7">문의</th><th class="tg-46o7">권유</th><th class="tg-46o7">합계</th><th class="tg-46o7">진도</th><th class="tg-46o7">달성</th>
                    <th class="tg-46o7">-</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $wire_teams = [['유선1팀', $wire1,'유1'], ['유선2팀', $wire2,'유2']];
                foreach($wire_teams as $t): ?>
                <tr <?php echo "id='".$t[2]."'"; ?>>
                    <td><?php echo $t[0]; ?></td>
                    <td class="wmtarget"><?php echo $t[1]['모목']; ?></td>
                    <td class="wmsuccess"><?php echo $t[1]['모개']; ?></td>
                    <td class="wmprogress"></td><td class="wmachieve"></td>
                    <td class="wittarget"><?php echo $t[1]['인티목']; ?></td>
                    <td class="witsuccess-q"><?php echo $t[1]['인티문의']; ?></td>
                    <td class="witsuccess-s"><?php echo $t[1]['인티권유']; ?></td>
                    <td class="witsuccess-total"></td>
                    <td class="witprogress"></td><td class="witachieve"></td>
                    <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="font-size:11px"><?php echo $t[1]['시간']; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td>계</td>
                    <td class="wmtargetTotal"></td><td class="wmsuccessTotal"></td><td class="wmprogressTotal"></td><td class="wmachieveTotal"></td>
                    <td class="wittargetTotal"></td><td class="witqTotal"></td><td class="witsTotal"></td><td class="wittotalTotal"></td><td class="witprogressTotal"></td><td class="witachieveTotal"></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <form action="successInsert.php" method="post">
            <fieldset>
                <legend>유선팀 실적 입력</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" id="wireTeamSelect" required>
                        <option value="">팀 선택</option>
                        <option value="유1">유선1</option><option value="유2">유선2</option>
                    </select>
                </div>
                <div class="form-row"><label>M이관 누적</label><input type="number" id="WMsuccess" name="Msuccess"></div>
                <div class="form-row"><label>IT문의 누적</label><input type="number" id="WITsuccess" name="ITsuccess"></div>
                <div class="form-row"><label>IT권유 누적</label><input type="number" id="WnewITsuccess" name="newITsuccess"></div>
                <input type="hidden" name="nowtime" value="<?php echo date('d일H:i:s').$days[$weekday]; ?>">
                <button type="submit">실적 제출</button>
            </fieldset>
        </form>

        <form action="goalinsert.php" method="post">
            <fieldset>
                <legend>유선팀 목표 설정</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname"  required>
                        <option value="">팀 선택</option>
                        <option value="유1">유선1</option><option value="유2">유선2</option>
                    </select>
                </div>
                <div class="form-row"><label>M목표</label><input type="number" name="Mtarget"></div>
                <div class="form-row"><label>IT목표</label><input type="number" name="ITtarget"></div>
                <button type="submit" style="background:#555;">목표 제출</button>
            </fieldset>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    const totalwork = Number($('.totalworkingday').attr('data-totalwork'));
    const remainwork = Number($('.remainworkingday').attr('data-remainwork'));
    const elapsed = totalwork - remainwork;

    function updateTable(tableId, isWire) {
        let prefix = isWire ? 'w' : '';
        let sums = { mTar:0, mSuc:0, itTar:0, itQ:0, itS:0, itTot:0 };

        $(`#${tableId} tbody tr:not(.total-row)`).each(function() {
            const row = $(this);
            
            // 1. M 가입기회발굴 계산
            let mTar = parseInt(row.find(`.${prefix}mtarget`).text()) || 0;
            let mSuc = parseInt(row.find(`.${prefix}msuccess`).text()) || 0;
            sums.mTar += mTar; sums.mSuc += mSuc;

            if(mTar > 0) {
                row.find(`.${prefix}machieve`).text(((mSuc/mTar)*100).toFixed(2) + '%');
                let exp = (mTar / totalwork) * elapsed;
                row.find(`.${prefix}mprogress`).text(exp > 0 ? ((mSuc/exp)*100).toFixed(2) + '%' : '0%');
            }

            // 2. IT 가입기회발굴 계산 (문의 + 권유 합산)
            let itTar = parseInt(row.find(`.${prefix}ittarget`).text()) || 0;
            let itQ = parseInt(row.find(`.${prefix}itsuccess-q`).text()) || 0;
            let itS = parseInt(row.find(`.${prefix}itsuccess-s`).text()) || 0;
            let itTot = itQ + itS;
            
            row.find(`.${prefix}itsuccess-total`).text(itTot); // 합계 칸에 입력
            sums.itTar += itTar; sums.itQ += itQ; sums.itS += itS; sums.itTot += itTot;

            if(itTar > 0) {
                row.find(`.${prefix}itachieve`).text(((itTot/itTar)*100).toFixed(2) + '%');
                let itExp = (itTar / totalwork) * elapsed;
                row.find(`.${prefix}itprogress`).text(itExp > 0 ? ((itTot/itExp)*100).toFixed(2) + '%' : '0%');
            }
        });

        // 3. 합계 행(Footer) 계산 결과 반영
        $(`.${prefix}mtargetTotal`).text(sums.mTar);
        $(`.${prefix}msuccessTotal`).text(sums.mSuc);
        if(sums.mTar > 0) {
            $(`.${prefix}machieveTotal`).text(((sums.mSuc/sums.mTar)*100).toFixed(2) + '%');
            let mExpTotal = (sums.mTar / totalwork) * elapsed;
            $(`.${prefix}mprogressTotal`).text(((sums.mSuc/mExpTotal)*100).toFixed(2) + '%');
        }

        $(`.${prefix}ittargetTotal`).text(sums.itTar);
        $(`.${prefix}itqTotal`).text(sums.itQ);
        $(`.${prefix}itsTotal`).text(sums.itS);
        $(`.${prefix}ittotalTotal`).text(sums.itTot);
        if(sums.itTar > 0) {
            $(`.${prefix}itachieveTotal`).text(((sums.itTot/sums.itTar)*100).toFixed(2) + '%');
            let itExpTotal = (sums.itTar / totalwork) * elapsed;
            $(`.${prefix}itprogressTotal`).text(((sums.itTot/itExpTotal)*100).toFixed(2) + '%');
        }
    }

    // 초기 실행
    updateTable('cs2table', false); // 무선
    updateTable('cs1table', true);  // 유선

    // 표 복사 기능 연동
    $('#c2tablecopy').click(function() { $lib.rangecopy('#cs2table'); });
    $('#c1tablecopy').click(function() { $lib.rangecopy('#cs1table'); });

    // 당일 입력 강조 (시간 표시의 마지막 글자가 요일과 같으면 배경색 변경)
    $('.colorchange').each(function() {
        if($(this).text().slice(-1) == $(this).attr('data-color')) {
            $(this).css({'background-color':'#2563eb', 'color':'white'});
        }
    });

    // 목표 입력 폼에서 팀 선택 시 해당 팀의 기존 목표값을 불러와서 입력란에 자동으로 채워주는 기능
    $('#muTeamSelect').change(function() {
        let selectedTeam = $(this).val();
        if(selectedTeam) {
            let targetRow = $(`#${selectedTeam}`);
            $('#Msuccess').val(targetRow.find('.msuccess').text());
            $('#ITsuccess').val(targetRow.find('.itsuccess-q').text());
            $('#newITsuccess').val(targetRow.find('.itsuccess-s').text());
        } else {
            $('#Msuccess, #ITsuccess, #newITsuccess').val('');
        }
    });

    $('#wireTeamSelect').change(function() {
        let selectedTeam = $(this).val();
        if(selectedTeam) {
            let targetRow = $(`#${selectedTeam}`);
            $('#WMsuccess').val(targetRow.find('.wmsuccess').text());
            $('#WITsuccess').val(targetRow.find('.witsuccess-q').text());
            $('#WnewITsuccess').val(targetRow.find('.witsuccess-s').text());
        } else {
            $('#WMsuccess, #WITsuccess, #WnewITsuccess').val('');
        }
    });
});
</script>
</body>
</html>