<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php'); 

// 무선5팀 제거됨
$teams = ['무1', '무2', '무3', '무4', '통품','유1','유2']; 
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

// 각 팀별 데이터 변수 할당 (무5 제거)
$mu1 = $teamData['무1'][0]; $mu2 = $teamData['무2'][0]; $mu3 = $teamData['무3'][0]; 
$mu4 = $teamData['무4'][0];  $tong = $teamData['통품'][0]; 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="../../java/library.js"></script>
    <title>CS1/2센터 누적실적</title>
    <style type="text/css">
        * { box-sizing: border-box; } 
        body { font-family: 'Malgun Gothic', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 10px; } 
        
        .headbox { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 15px; text-align: center; } 
        .headbox h3 { margin: 0 0 10px 0; font-size: 1.2rem; }
        #goal { font-weight: bold; font-size: 0.85rem; line-height: 1.6; display: flex; flex-wrap: wrap; justify-content: center; gap: 5px; } 
        .totalworkingday { color: #007bff; } 
        .remainworkingday { color: #dc3545; } 
        .headbox a { display: block; margin-top: 8px; background: #2563eb; color: white !important; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-weight: normal; }

        .container { display: flex; flex-direction: column; gap: 15px; width: 100%; max-width: 1200px; margin: 0 auto; } 
        
        .cs2centerdash, .cs1centerdash { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 100%; } 
        h4 { border-left: 5px solid #333; padding-left: 10px; margin: 0 0 10px 0; font-size: 1.1rem; } 
        
        .table-wrapper { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin-bottom: 20px; border-radius: 4px; }
        .tg { width: 100%; table-layout: fixed; } 
        .tg td, .tg th { border: 1px solid #ddd; text-align: center; word-break: keep-all; } 
        .tg .tg-46o7 { background-color: #333; color: #fff; font-weight: bold; } 
        .total-row { background-color: #eee !important; font-weight: bold; } 

        fieldset { border: 1px solid #eee; border-radius: 6px; padding: 12px; margin-bottom: 10px; background: #fafafa; width: 100%; } 
        legend { font-weight: bold; font-size: 0.95rem; padding: 0 5px; }
        
        .form-row { display: flex; flex-direction: row; align-items: center; margin-bottom: 8px; flex-wrap: wrap; gap: 5px; } 
        .form-row label { width: 90px; font-size: 12px; font-weight: bold; flex-shrink: 0; } 
        .form-row input, .form-row select { flex: 1; min-width: 120px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; } 
        
        button { width: 100%; padding: 12px; background: #333; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; margin-top: 5px; } 
        button#c2tablecopy, button#c1tablecopy { padding: 8px; font-size: 0.85rem; width: auto; margin-bottom: 10px; border-radius: 4px; }

        @media (min-width: 768px) {
            body { padding: 20px; }
            .container { flex-direction: row; align-items: flex-start; }
            .cs2centerdash, .cs1centerdash { flex: 1; }
            #goal { font-size: 1rem; }
            .headbox a { display: inline-block; margin-top: 0; margin-left: 10px; padding: 5px 10px; }
            .form-row { flex-wrap: nowrap; }
        }
    </style>
</head>
<body>

<div class="headbox">
    <h3>CS센터(유,무선) <span><?php echo (int)$month; ?></span>월 누적 실적 현황</h3> 
    <div id="goal">
        <span data-totalwork="<?php echo $total_working_days; ?>" class="totalworkingday"><?php echo (int)$month."월 총 영업일: ".$total_working_days; ?>일</span> <span class="separator">|</span>
        <span data-remainwork="<?php echo $remaining_days; ?>" class="remainworkingday"><?php echo "잔여 영업일: ".$remaining_days; ?>일</span> <span class="separator">|</span>
        <span class="today"><?php echo "Today: ".date('Y-m-d'); ?></span>
        <a href="../today_end_sales/index_old.php">일일 실적마감창 이동</a> 
    </div>
</div>

<div class="container">
    <!-- 무선 누적 실적 -->
    <div class="cs2centerdash">
        <h4>CS센터(무선) 누적 실적</h4>
        <button id="c2tablecopy" style="background:#007bff;">표 복사</button>
        
        <div class="table-wrapper">
            <table class="tg" id="cs2table" border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 10px; text-align: center; letter-spacing: -0.5px;">
                <colgroup>
                    <col width="10%"> <!-- 팀 -->
                    <col width="7%"> <!-- M목표 -->
                    <col width="7%"> <!-- M개통 -->
                    <col width="9%"> <!-- M진도 -->
                    <col width="9%"> <!-- M달성 -->
                    <col width="7%"> <!-- IT목표 -->
                    <col width="7%"> <!-- IT문의 -->
                    <col width="7%"> <!-- IT권유 -->
                    <col width="7%"> <!-- IT계 -->
                    <col width="9%"> <!-- IT진도 -->
                    <col width="9%"> <!-- IT달성 -->
                    <col width="12%"> <!-- 일시 -->
                </colgroup>
                <thead>
                    <tr>
                        <th class="tg-46o7" rowspan="2" style="padding:4px 0;">팀</th>
                        <th class="tg-46o7" colspan="4" style="padding:4px 0;">M가입기회발굴</th>
                        <th class="tg-46o7" colspan="6" style="padding:4px 0;">IT가입기회발굴</th> 
                        <th class="tg-46o7" style="padding:4px 0;">일시</th>
                    </tr>
                    <tr>
                        <th class="tg-46o7" style="padding:4px 0;">목표</th>
                        <th class="tg-46o7" style="padding:4px 0;">개통</th>
                        <th class="tg-46o7" style="padding:4px 0;">진도</th>
                        <th class="tg-46o7" style="padding:4px 0;">달성</th>
                        <th class="tg-46o7" style="padding:4px 0;">목표</th>
                        <th class="tg-46o7" style="padding:4px 0;">문의</th>
                        <th class="tg-46o7" style="padding:4px 0;">권유</th>
                        <th class="tg-46o7" style="padding:4px 0;">계</th>
                        <th class="tg-46o7" style="padding:4px 0;">진도</th>
                        <th class="tg-46o7" style="padding:4px 0;">달성</th>
                        <th class="tg-46o7" style="padding:4px 0;">-</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $mu_teams = [['무선1팀', $mu1,'무1'], ['무선2팀', $mu2,'무2'], ['무선3팀', $mu3,'무3'], ['무선4팀', $mu4,'무4'], ['통화품질팀', $tong,'통품']]; 
                    foreach($mu_teams as $t): ?>
                    <tr <?php echo "id='".$t[2]."'"; ?>>
                        <td style="padding:6px 0;"><?php echo $t[0]; ?></td>
                        <td class="mtarget" style="padding:6px 0;"><?php echo $t[1]['모목']; ?></td>
                        <td class="msuccess" style="padding:6px 0;"><?php echo $t[1]['모개']; ?></td>
                        <td class="mprogress" style="padding:6px 0;"></td><td class="machieve" style="padding:6px 0;"></td>
                        
                        <td class="ittarget" style="padding:6px 0;"><?php echo $t[1]['인티목']; ?></td>
                        <td class="itsuccess-q" style="padding:6px 0;"><?php echo $t[1]['인티문의']; ?></td>
                        <td class="itsuccess-s" style="padding:6px 0;"><?php echo $t[1]['인티권유']; ?></td>
                        <td class="itsuccess-total" style="padding:6px 0;"></td>
                        <td class="itprogress" style="padding:6px 0;"></td><td class="itachieve" style="padding:6px 0;"></td>
                        
                        <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="padding:6px 0; font-size:9px; letter-spacing:-1px;"><?php echo $t[1]['시간']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td style="padding:6px 0;">계</td>
                        <td class="mtargetTotal" style="padding:6px 0;"></td><td class="msuccessTotal" style="padding:6px 0;"></td>
                        <td class="mprogressTotal" style="padding:6px 0;"></td><td class="machieveTotal" style="padding:6px 0;"></td>
                        
                        <td class="ittargetTotal" style="padding:6px 0;"></td>
                        <td class="itqTotal" style="padding:6px 0;"></td>
                        <td class="itsTotal" style="padding:6px 0;"></td>
                        <td class="ittotalTotal" style="padding:6px 0;"></td>
                        <td class="itprogressTotal" style="padding:6px 0;"></td><td class="itachieveTotal" style="padding:6px 0;"></td>
                        
                        <td style="padding:6px 0;">-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form action="successInsert.php" method="post">
            <fieldset>
                <legend>무선팀 실적 입력</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" id="muTeamSelect" required>
                        <option value="">팀 선택</option>
                        <option value="무1">무선1</option><option value="무2">무선2</option><option value="무3">무선3</option>
                        <option value="무4">무선4</option><option value="통품">통품</option>
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
                        <option value="무4">무선4</option><option value="통품">통품</option>
                    </select>
                </div>
                <div class="form-row"><label>M목표</label><input type="number" name="Mtarget"></div>
                <div class="form-row"><label>IT목표</label><input type="number" name="ITtarget"></div>
                <button type="submit" style="background:#555;">목표 제출</button>
            </fieldset>
        </form>
    </div>

    <!-- 유선 누적 실적 -->
    <div class="cs1centerdash">
        <h4>CS센터(유선) 누적 실적</h4>
        <button id="c1tablecopy" style="background:#007bff;">표 복사</button>
        
        <div class="table-wrapper">
            <table class="tg" id="cs1table" border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 10px; text-align: center; letter-spacing: -0.5px;">
                <colgroup>
                    <col width="10%">
                    <col width="7%">
                    <col width="7%">
                    <col width="9%">
                    <col width="9%">
                    <col width="7%">
                    <col width="7%">
                    <col width="7%">
                    <col width="7%">
                    <col width="9%">
                    <col width="9%">
                    <col width="12%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="tg-46o7" rowspan="2" style="padding:4px 0;">팀</th>
                        <th class="tg-46o7" colspan="4" style="padding:4px 0;">M가입기회발굴</th>
                        <th class="tg-46o7" colspan="6" style="padding:4px 0;">IT가입기회발굴</th>
                        <th class="tg-46o7" style="padding:4px 0;">일시</th>
                    </tr>
                    <tr>
                        <th class="tg-46o7" style="padding:4px 0;">목표</th>
                        <th class="tg-46o7" style="padding:4px 0;">개통</th>
                        <th class="tg-46o7" style="padding:4px 0;">진도</th>
                        <th class="tg-46o7" style="padding:4px 0;">달성</th>
                        <th class="tg-46o7" style="padding:4px 0;">목표</th>
                        <th class="tg-46o7" style="padding:4px 0;">문의</th>
                        <th class="tg-46o7" style="padding:4px 0;">권유</th>
                        <th class="tg-46o7" style="padding:4px 0;">계</th>
                        <th class="tg-46o7" style="padding:4px 0;">진도</th>
                        <th class="tg-46o7" style="padding:4px 0;">달성</th>
                        <th class="tg-46o7" style="padding:4px 0;">-</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $wire_teams = [['유선1팀', $wire1,'유1'], ['유선2팀', $wire2,'유2']];
                    foreach($wire_teams as $t): ?>
                    <tr <?php echo "id='".$t[2]."'"; ?>>
                        <td style="padding:6px 0;"><?php echo $t[0]; ?></td>
                        <td class="wmtarget" style="padding:6px 0;"><?php echo $t[1]['모목']; ?></td>
                        <td class="wmsuccess" style="padding:6px 0;"><?php echo $t[1]['모개']; ?></td>
                        <td class="wmprogress" style="padding:6px 0;"></td><td class="wmachieve" style="padding:6px 0;"></td>
                        
                        <td class="wittarget" style="padding:6px 0;"><?php echo $t[1]['인티목']; ?></td>
                        <td class="witsuccess-q" style="padding:6px 0;"><?php echo $t[1]['인티문의']; ?></td>
                        <td class="witsuccess-s" style="padding:6px 0;"><?php echo $t[1]['인티권유']; ?></td>
                        <td class="witsuccess-total" style="padding:6px 0;"></td>
                        <td class="witprogress" style="padding:6px 0;"></td><td class="witachieve" style="padding:6px 0;"></td>
                        
                        <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="padding:6px 0; font-size:9px; letter-spacing:-1px;"><?php echo $t[1]['시간']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td style="padding:6px 0;">계</td>
                        <td class="wmtargetTotal" style="padding:6px 0;"></td><td class="wmsuccessTotal" style="padding:6px 0;"></td>
                        <td class="wmprogressTotal" style="padding:6px 0;"></td><td class="wmachieveTotal" style="padding:6px 0;"></td>
                        
                        <td class="wittargetTotal" style="padding:6px 0;"></td>
                        <td class="witqTotal" style="padding:6px 0;"></td>
                        <td class="witsTotal" style="padding:6px 0;"></td>
                        <td class="wittotalTotal" style="padding:6px 0;"></td>
                        <td class="witprogressTotal" style="padding:6px 0;"></td><td class="witachieveTotal" style="padding:6px 0;"></td>
                        
                        <td style="padding:6px 0;">-</td>
                    </tr>
                </tbody>
            </table>
        </div>

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
                <div class="form-row"><label>M개통 누적</label><input type="number" id="WMsuccess" name="Msuccess"></div>
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
    
    let pastDays = totalwork - remainwork;
    if (pastDays < 0) pastDays = 0;

    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    let todayProgress = 0;

    if (hours >= 18) {
        todayProgress = 1; 
    } else if (hours >= 9) {
        todayProgress = ((hours - 9) * 60 + minutes) / 540;
    }

    let elapsed = pastDays + todayProgress;

    if (elapsed > totalwork) elapsed = totalwork;
    if (elapsed <= 0.01) elapsed = 0.01; 
    
    function updateTable(tableId, isWire) {
        let prefix = isWire ? 'w' : '';
        let sums = { mTar:0, mSuc:0, itTar:0, itQ:0, itS:0, itTot:0 };

        $(`#${tableId} tbody tr:not(.total-row)`).each(function() {
            const row = $(this);
            
            // M 계산 로직
            let mTar = parseInt(row.find(`.${prefix}mtarget`).text()) || 0;
            let mSuc = parseInt(row.find(`.${prefix}msuccess`).text()) || 0;
            sums.mTar += mTar; sums.mSuc += mSuc;

            if(mTar > 0) {
                row.find(`.${prefix}machieve`).text(((mSuc/mTar)*100).toFixed(2) + '%');
                let exp = (mTar / totalwork) * elapsed;
                row.find(`.${prefix}mprogress`).text(exp > 0 ? ((mSuc/exp)*100).toFixed(2) + '%' : '0%');
            }

            // IT 계산 로직 (문의, 권유 합산)
            let itTar = parseInt(row.find(`.${prefix}ittarget`).text()) || 0;
            let itQ = parseInt(row.find(`.${prefix}itsuccess-q`).text()) || 0; // IT문의
            let itS = parseInt(row.find(`.${prefix}itsuccess-s`).text()) || 0; // IT권유
            let itTot = itQ + itS;
            
            row.find(`.${prefix}itsuccess-total`).text(itTot); 
            sums.itTar += itTar; sums.itQ += itQ; sums.itS += itS; sums.itTot += itTot;

            if(itTar > 0) {
                row.find(`.${prefix}itachieve`).text(((itTot/itTar)*100).toFixed(2) + '%');
                let itExp = (itTar / totalwork) * elapsed;
                row.find(`.${prefix}itprogress`).text(itExp > 0 ? ((itTot/itExp)*100).toFixed(2) + '%' : '0%');
            }
        });

        // M 합산 결과 뿌려주기
        $(`.${prefix}mtargetTotal`).text(sums.mTar);
        $(`.${prefix}msuccessTotal`).text(sums.mSuc);
        if(sums.mTar > 0) {
            $(`.${prefix}machieveTotal`).text(((sums.mSuc/sums.mTar)*100).toFixed(2) + '%');
            let mExpTotal = (sums.mTar / totalwork) * elapsed;
            $(`.${prefix}mprogressTotal`).text(((sums.mSuc/mExpTotal)*100).toFixed(2) + '%');
        }

        // IT 합산 결과 뿌려주기 (목표, 문의, 권유, 계, 진도, 달성)
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

    updateTable('cs2table', false); 
    updateTable('cs1table', true);  

    $('#c2tablecopy').click(function() { $lib.rangecopy('#cs2table'); });
    $('#c1tablecopy').click(function() { $lib.rangecopy('#cs1table'); });

    $('.colorchange').each(function() {
        if($(this).text().slice(-1) == $(this).attr('data-color')) {
            $(this).css({'background-color':'#2563eb', 'color':'white'});
        }
    });

    // 팀 선택 시 폼에 기존 실적 자동 채우기 연동 (문의+권유 모두 포함)
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

    // 폼 제출 시 다른 페이지로 이동 방지 및 비동기 처리(AJAX)
    $('form').on('submit', function(e) {
        e.preventDefault(); // 기본 액션(페이지 이동) 중단
        let form = $(this);
        
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                alert("정상적으로 처리되었습니다.");
                window.location.reload(); // 성공 시 화면 새로고침하여 바뀐 데이터 즉시 반영
            },
            error: function(error) {
                alert("데이터 처리 중 오류가 발생했습니다.");
            }
        });
    });
});
</script>
</body>
</html>

