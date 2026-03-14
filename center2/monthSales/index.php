<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php');

// ... (기본 PHP 로직 유지) ...

$teams = ['무1', '무2', '무3', '무4', '무5', '통품','유1','유2'];
$teamData = [];
foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT m_goal , m_success , it_goal , it_success , todaytime FROM c2sales_month WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    if (!$re) {
        die("쿼리 실행 에러: " . mysqli_error($conn) . " (에러 난 SQL: $sql)");
    }

    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['모목' => $row['m_goal'], '모개' => $row['m_success'], '인티목' => $row['it_goal'], '인티개' => $row['it_success'] , '시간' => $row['todaytime']];
    }
}


$mu1 = [$teamData['무1'][0]['모목'], $teamData['무1'][0]['모개'], $teamData['무1'][0]['인티목'], $teamData['무1'][0]['인티개'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['모목'], $teamData['무2'][0]['모개'], $teamData['무2'][0]['인티목'], $teamData['무2'][0]['인티개'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['모목'], $teamData['무3'][0]['모개'], $teamData['무3'][0]['인티목'], $teamData['무3'][0]['인티개'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['모목'], $teamData['무4'][0]['모개'], $teamData['무4'][0]['인티목'], $teamData['무4'][0]['인티개'],$teamData['무4'][0]['시간']];
$mu5 = [$teamData['무5'][0]['모목'], $teamData['무5'][0]['모개'], $teamData['무5'][0]['인티목'], $teamData['무5'][0]['인티개'],$teamData['무5'][0]['시간']];
$tong = [$teamData['통품'][0]['모목'], $teamData['통품'][0]['모개'], $teamData['통품'][0]['인티목'], $teamData['통품'][0]['인티개'],$teamData['통품'][0]['시간']];
$wire1 = [$teamData['유1'][0]['모목'], $teamData['유1'][0]['모개'], $teamData['유1'][0]['인티목'], $teamData['유1'][0]['인티개'],$teamData['유1'][0]['시간']];
$wire2 = [$teamData['유2'][0]['모목'], $teamData['유2'][0]['모개'], $teamData['유2'][0]['인티목'], $teamData['유2'][0]['인티개'],$teamData['유2'][0]['시간']];


$weekday = date('l'); 
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"];

$year = date('Y');
$month = date('m');
$today = date('Y-m-d');
$my_holidays = ['2026-03-02'];
$last_day = date('t', mktime(0, 0, 0, $month, 1, $year));
$total_working_days = 0;
$remaining_days = 0;

for ($day = 1; $day <= $last_day; $day++) {
    $date_string = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    $day_of_week = date('N', strtotime($date_string));

    if ($day_of_week < 6 && !in_array($date_string, $my_holidays)) {
        $total_working_days++;
        if ($date_string >= $today) {
            $remaining_days++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="../../java/library.js"></script>
    <title>CS1/2센터 누적실적</title>
    <style type="text/css">
        body { font-family: 'Malgun Gothic', sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .headbox { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; text-align: center; }
        .headbox h3 { margin: 0 0 10px 0; color: #222; }
        #goal { font-weight: bold; font-size: 1.1rem; }
        .totalworkingday { color: #007bff; }
        .remainworkingday { color: #dc3545; }

        .container { display: flex; flex-direction: row; gap: 30px; justify-content: center; align-items: flex-start; }
        .cs2centerdash, .cs1centerdash { flex: 1; min-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        
        h4 { border-left: 5px solid #333; padding-left: 10px; margin-bottom: 15px; }

        /* 테이블 스타일 */
        .tg { border-collapse: collapse; width: 100%; margin-bottom: 25px; table-layout: fixed; }
        .tg td, .tg th { border: 1px solid #ddd; padding: 10px 5px; text-align: center; font-size: 13px; }
        .tg .tg-46o7 { background-color: #333; color: #fff; font-weight: bold; }
        .tg .tg-ikxu { background-color: #444; color: #fff; }
        .tg tr:nth-child(even) { background-color: #fefefe; }

        /* 입력 폼 스타일 */
        form { margin-top: 20px; }
        fieldset { border: 1px solid #eee; border-radius: 6px; padding: 15px; margin-bottom: 15px; background: #fafafa; }
        legend { font-weight: bold; padding: 0 10px; color: #555; font-size: 0.95rem; }
        
        .form-row { display: flex; align-items: center; margin-bottom: 10px; }
        .form-row label { width: 120px; font-size: 13px; font-weight: bold; }
        .form-row select, .form-row input { flex: 1; padding: 6px; border: 1px solid #ccc; border-radius: 4px; }
        
        button { width: 100%; padding: 10px; background: #333; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background 0.2s; font-weight: bold; }
        button:hover { background: #555; }

        /* 계(Total) 행 강조 */
        .total-row { background-color: #eee !important; font-weight: bold; }
    </style>
</head>
<body>

<div class="headbox">
    <h3>CS1,2센터 <span id="nowmonth"><?php echo (int)$month; ?></span>월 누적 실적 현황</h3>
    <div id="goal">
        <span data-totalwork="<?php echo $total_working_days; ?>" class="totalworkingday"><?php echo (int)$month."월 총 영업일: ".$total_working_days; ?>일</span>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <span data-remainwork="<?php echo $remaining_days; ?>" class="remainworkingday"><?php echo "잔여 영업일: ".$remaining_days; ?>일</span>&nbsp;&nbsp;|&nbsp;&nbsp;
        <span class="today"><?php echo "Today: ".date('Y-m-d'); ?></span>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="../today_end_sales/index.php" style="color:#007bff; text-decoration:none;">일일 실적마감창 이동</a>
    </div>
</div>

<div class="container">
    <div class="cs2centerdash">
        <h4>CS2센터(무선) 누적 실적</h4> <button id="c2tablecopy" style="margin-bottom:10px; background:#007bff;">표 복사 ->클릭후 엑셀에 붙여넣기</button>
        <table class="tg" id="cs2table">
            <thead>
                <tr>
                    <th class="tg-46o7" rowspan="2" style="width:15%">팀</th>
                    <th class="tg-46o7" colspan="4">M가입기회발굴</th>
                    <th class="tg-46o7" colspan="4">IT가입기회발굴</th>
                    <th class="tg-46o7" style="width:15%">입력일시</th>
                </tr>
                <tr>
                    <th class="tg-46o7">목표</th>
                    <th class="tg-46o7">개통</th>
                    <th class="tg-46o7">진도</th>
                    <th class="tg-46o7">달성</th>
                    <th class="tg-46o7">목표</th>
                    <th class="tg-ikxu">개통</th>
                    <th class="tg-ikxu">진도</th>
                    <th class="tg-46o7">달성</th>
                    <th class="tg-46o7">-</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $mu_teams = [['무선1팀', $mu1], ['무선2팀', $mu2], ['무선3팀', $mu3], ['무선4팀', $mu4], ['무선5팀', $mu5], ['통화품질팀', $tong]];
                foreach($mu_teams as $t): ?>
                <tr>
                    <td><?php echo $t[0]; ?></td>
                    <td class="mtarget"><?php echo $t[1][0]; ?></td>
                    <td class="msuccess"><?php echo $t[1][1]; ?></td>
                    <td></td><td></td>
                    <td class="ITtarget"><?php echo $t[1][2]; ?></td>
                    <td class="ITsuccess"><?php echo $t[1][3]; ?></td>
                    <td></td><td></td>
                    <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="font-size:11px"><?php echo $t[1][4]; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td>계</td>
                    <td class="mtargetTotal"></td><td class="msuccessTotal"></td><td></td><td class="comRate"></td>
                    <td class="ITtargetTotal"></td><td class="ITsuccessTotal"></td><td></td><td class="itcomRate"></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <form action="successInsert.php" method="post">
            <fieldset>
                <legend>무선팀 실적 입력</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" required>
                        <option value="">팀선택</option>
                        <option value="무1">무선1</option><option value="무2">무선2</option>
                        <option value="무3">무선3</option><option value="무4">무선4</option>
                        <option value="무5">무선5</option><option value="통품">통품</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>M개통 누적</label>
                    <input type="number" name="Msuccess">
                </div>
                <div class="form-row">
                    <label>IT개통 누적</label>
                    <input type="number" name="ITsuccess">
                </div>
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
                        <option value="">팀선택</option>
                        <option value="무1">무선1</option><option value="무2">무선2</option>
                        <option value="무3">무선3</option><option value="무4">무선4</option>
                        <option value="무5">무선5</option><option value="통품">통품</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>M개통 목표</label>
                    <input type="number" name="Mtarget">
                </div>
                <div class="form-row">
                    <label>IT개통 목표</label>
                    <input type="number" name="ITtarget">
                </div>
                <button type="submit">목표 제출</button>
            </fieldset>
        </form>
    </div>

    <div class="cs1centerdash">
        <h4>CS1센터(유선) 누적 실적</h4><button id="c1tablecopy" style="margin-bottom:10px; background:#007bff;">표 복사 ->클릭후 엑셀에 붙여넣기</button>
        <table class="tg" id="cs1table">
            <thead>
                <tr>
                    <th class="tg-46o7" rowspan="2" style="width:15%">팀</th>
                    <th class="tg-46o7" colspan="4">M가입기회발굴</th>
                    <th class="tg-46o7" colspan="4">IT가입기회발굴</th>
                    <th class="tg-46o7" style="width:15%">입력일시</th>
                </tr>
                <tr>
                    <th class="tg-46o7">목표</th>
                    <th class="tg-46o7">개통</th>
                    <th class="tg-46o7">진도</th>
                    <th class="tg-46o7">달성</th>
                    <th class="tg-46o7">목표</th>
                    <th class="tg-ikxu">개통</th>
                    <th class="tg-ikxu">진도</th>
                    <th class="tg-46o7">달성</th>
                    <th class="tg-46o7">-</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>유선1팀</td>
                    <td class="Wmtarget"><?php echo $wire1[0]; ?></td>
                    <td class="Wmsuccess"><?php echo $wire1[1]; ?></td>
                    <td></td><td></td>
                    <td class="WITtarget"><?php echo $wire1[2]; ?></td>
                    <td class="WITsuccess"><?php echo $wire1[3]; ?></td>
                    <td></td><td></td>
                    <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="font-size:11px"><?php echo $wire1[4]; ?></td>
                </tr>
                <tr>
                    <td>유선2팀</td>
                    <td class="Wmtarget"><?php echo $wire2[0]; ?></td>
                    <td class="Wmsuccess"><?php echo $wire2[1]; ?></td>
                    <td></td><td></td>
                    <td class="WITtarget"><?php echo $wire2[2]; ?></td>
                    <td class="WITsuccess"><?php echo $wire2[3]; ?></td>
                    <td></td><td></td>
                    <td class="colorchange" data-color="<?php echo $days[$weekday]; ?>" style="font-size:11px"><?php echo $wire2[4]; ?></td>
                </tr>
                <tr class="total-row">
                    <td>계</td>
                    <td class="WmtargetTotal"></td><td class="WmsuccessTotal"></td><td></td><td class="wcomrate"></td>
                    <td class="WITtargetTotal"></td><td class="WITsuccessTotal"></td><td></td><td class="witcomrate"></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <form action="successInsert.php" method="post">
            <fieldset>
                <legend>유선팀 실적 입력</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" required>
                        <option value="">팀선택</option>
                        <option value="유1">유선1</option>
                        <option value="유2">유선2</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>M개통 누적</label>
                    <input type="number" name="Msuccess">
                </div>
                <div class="form-row">
                    <label>IT개통 누적</label>
                    <input type="number" name="ITsuccess">
                </div>
                <input type="hidden" name="nowtime" value="<?php echo date('d일H:i:s').$days[$weekday]; ?>">
                <button type="submit">실적 제출</button>
            </fieldset>
        </form>

        <form action="goalinsert.php" method="post">
            <fieldset>
                <legend>유선팀 목표 설정</legend>
                <div class="form-row">
                    <label>팀명 선택</label>
                    <select name="teamname" required>
                        <option value="">팀선택</option>
                        <option value="유1">유선1</option>
                        <option value="유2">유선2</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>M개통 목표</label>
                    <input type="number" name="Mtarget">
                </div>
                <div class="form-row">
                    <label>IT개통 목표</label>
                    <input type="number" name="ITtarget">
                </div>
                <button type="submit">목표 제출</button>
            </fieldset>
        </form>
    </div>
</div>

</body>
</html>
    <script>
        $('tr >.mtarget').each(function() {
            var mtarget = parseInt($(this).text());
            var msuccess = parseInt($(this).next().text());
            var mprogress = $(this).next().next();
            var machievement = mprogress.next();
            
            if (mtarget > 0) {
                var progressPercent = (msuccess / mtarget) * 100;
                machievement.text(progressPercent.toFixed(2) + '%');
                
            } else {
                machievement.text('0%');
                
            }
        }); // M달성율 계산

        $('tr > .ITtarget').each(function() {
            var ittarget = parseInt($(this).text());
            var itsuccess = parseInt($(this).next().text());
            var itprogress = $(this).next().next();
            var itachievement = itprogress.next();
            
            if (ittarget > 0) {
                var progressPercent = (itsuccess / ittarget) * 100;
                itachievement.text(progressPercent.toFixed(2) + '%');
                
            } else {
                itachievement.text('0%');
                
            }
        }); // IT달성율 계산

        $('tr > .wmtarget').each(function() {
            var wmtarget = parseInt($(this).text());
            var wmsuccess = parseInt($(this).next().text());
            var wmprogress = $(this).next().next();
            var wmachievement = wmprogress.next();
            
            if (wmtarget > 0) {
                var progressPercent = (wmsuccess / wmtarget) * 100;
                wmachievement.text(progressPercent.toFixed(2) + '%');
                
            } else {
                wmachievement.text('0%');
                
            }
        }); // 유선 M달성율 계산

        $('tr > .WITtarget').each(function() {
            var wittarget = parseInt($(this).text());
            var witsuccess = parseInt($(this).next().text());
            var witprogress = $(this).next().next();
            var witachievement = witprogress.next();
            
            if (wittarget > 0) {
                var progressPercent = (witsuccess / wittarget) * 100;
                witachievement.text(progressPercent.toFixed(2) + '%');
                
            } else {
                witachievement.text('0%');
                
            }
        }); // 유선 IT달성율 계산

         $('.mtarget').each(function() {
            var totalMtarget = 0;
            var totalMsuccess = 0;

            $('.mtarget').each(function() {
                totalMtarget += parseInt($(this).text());
            });

            $('.msuccess').each(function() {
                totalMsuccess += parseInt($(this).text());
            });

            $('.mtargetTotal').text(totalMtarget);
            $('.msuccessTotal').text(totalMsuccess);

            if (totalMtarget > 0) {
                var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                $('.machievementTotal').text(totalProgressPercent.toFixed(2) + '%');
            } else {
                $('.machievementTotal').text('0%');
            }})

            $('.comRate').each(function() {
                var totalMtarget = parseInt($('.mtargetTotal').text());
                var totalMsuccess = parseInt($('.msuccessTotal').text());

                if (totalMtarget > 0) {
                    var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                    $('.comRate').text(totalProgressPercent.toFixed(2) + '%');
                } else {
                    $('.comRate').text('0%');
                }
            }); // M달성율 계산

            $('.Wmtarget').each(function() {
            var totalMtarget = 0;
            var totalMsuccess = 0;

            $('.Wmtarget').each(function() {
                totalMtarget += parseInt($(this).text());
            });

            $('.Wmsuccess').each(function() {
                totalMsuccess += parseInt($(this).text());
            });

            $('.WmtargetTotal').text(totalMtarget);
            $('.WmsuccessTotal').text(totalMsuccess);

            if (totalMtarget > 0) {
                var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                $('.WmachievementTotal').text(totalProgressPercent.toFixed(2) + '%');
            } else {
                $('.WmachievementTotal').text('0%');
            }})

            $('.wcomrate').each(function() {
                var totalMtarget = parseInt($('.WmtargetTotal').text());
                var totalMsuccess = parseInt($('.WmsuccessTotal').text());

                if (totalMtarget > 0) {
                    var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                    $('.wcomrate').text(totalProgressPercent.toFixed(2) + '%');
                } else {
                    $('.wcomrate').text('0%');
                }
            }); // 유선 M달성율 계산

            $('.mtarget').each(function() {
            var totalMtarget = 0;
            var totalMsuccess = 0;

            $('.ITtarget').each(function() {
                totalMtarget += parseInt($(this).text());
            });

            $('.ITsuccess').each(function() {
                totalMsuccess += parseInt($(this).text());
            });

            $('.ITtargetTotal').text(totalMtarget);
            $('.ITsuccessTotal').text(totalMsuccess);

            if (totalMtarget > 0) {
                var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                $('.itcomRate').text(totalProgressPercent.toFixed(2) + '%');
            } else {
                $('.itcomRate').text('0%');
            }})

            $('.WITtarget').each(function() {
            var totalMtarget = 0;
            var totalMsuccess = 0;

            $('.WITtarget').each(function() {
                totalMtarget += parseInt($(this).text());
            });

            $('.ITsuccess').each(function() {
                totalMsuccess += parseInt($(this).text());
            });

            $('.WITtargetTotal').text(totalMtarget);
            $('.WITsuccessTotal').text(totalMsuccess);

            if (totalMtarget > 0) {
                var totalProgressPercent = (totalMsuccess / totalMtarget) * 100;
                $('.witcomrate').text(totalProgressPercent.toFixed(2) + '%');
            } else {
                $('.witcomrate').text('0%');
            }})

     // 무선 M진도율 계산
       const totalworkingday = Number($('.totalworkingday').attr('data-totalwork')); 
    const remainworkingday = Number($('.remainworkingday').attr('data-remainwork')); 
    const elapsedworkingday = totalworkingday - remainworkingday; // 경과 영업일

   
// 진도율 함수 실험
   function progressrate(element){
     element.each(function() {
    var mtarget = parseInt($(this).prev().text()) || 0; // 목표값 (NaN 방지)
    var msuccess = parseInt($(this).text()) || 0;     // 실적값 (NaN 방지)
    var mprogress = $(this).next();

    // 1. 현재 시점까지 달성했어야 하는 목표 기대치 계산
    var expectedTarget = (mtarget / totalworkingday) * elapsedworkingday;

    // 2. 진도율 계산 (0으로 나누기 방지 처리)
    var progressrate = 0;
    if (expectedTarget > 0) {
        progressrate = (msuccess / expectedTarget) * 100;
    }

    mprogress.text(progressrate.toFixed(2) + '%');
});
   }

   progressrate($('tr > .msuccess')); // 무선 M진도율 계산 함수 호출
   progressrate($('tr > .Wmsuccess')); // 유선 M진도율 계산 함수 호출
   progressrate($('tr > .ITsuccess')); // 무선 IT진도율 계산 함수 호출
   progressrate($('tr > .WITsuccess')); // 유선 IT진도율
 // 페이지 로드 시 진도율 계산 함수 호출

 $('tr > .ITsuccessTotal').each(function() {
    var mtarget = parseInt($(this).prev().text()) || 0; // 목표값 (NaN 방지)
    var msuccess = parseInt($(this).text()) || 0;     // 실적값 (NaN 방지)
    var mprogress = $(this).next();

    // 1. 현재 시점까지 달성했어야 하는 목표 기대치 계산
    var expectedTarget = (mtarget / totalworkingday) * elapsedworkingday;

    // 2. 진도율 계산 (0으로 나누기 방지 처리)
    var progressrate = 0;
    if (expectedTarget > 0) {
        progressrate = (msuccess / expectedTarget) * 100;
    }

    mprogress.text(progressrate.toFixed(2) + '%');
});

$('tr > .msuccessTotal').each(function() {
    var mtarget = parseInt($(this).prev().text()) || 0; // 목표값 (NaN 방지)
    var msuccess = parseInt($(this).text()) || 0;     // 실적값 (NaN 방지)
    var mprogress = $(this).next();

    // 1. 현재 시점까지 달성했어야 하는 목표 기대치 계산
    var expectedTarget = (mtarget / totalworkingday) * elapsedworkingday;

    // 2. 진도율 계산 (0으로 나누기 방지 처리)
    var progressrate = 0;
    if (expectedTarget > 0) {
        progressrate = (msuccess / expectedTarget) * 100;
    }

    mprogress.text(progressrate.toFixed(2) + '%');
});

$('tr > .WmsuccessTotal').each(function() {
    var mtarget = parseInt($(this).prev().text()) || 0; // 목표값 (NaN 방지)
    var msuccess = parseInt($(this).text()) || 0;     // 실적값 (NaN 방지)
    var mprogress = $(this).next();

    // 1. 현재 시점까지 달성했어야 하는 목표 기대치 계산
    var expectedTarget = (mtarget / totalworkingday) * elapsedworkingday;

    // 2. 진도율 계산 (0으로 나누기 방지 처리)
    var progressrate = 0;
    if (expectedTarget > 0) {
        progressrate = (msuccess / expectedTarget) * 100;
    }

    mprogress.text(progressrate.toFixed(2) + '%');
});

$('tr > .WITsuccessTotal').each(function() {
    var mtarget = parseInt($(this).prev().text()) || 0; // 목표값 (NaN 방지)
    var msuccess = parseInt($(this).text()) || 0;     // 실적값 (NaN 방지)
    var mprogress = $(this).next();

    // 1. 현재 시점까지 달성했어야 하는 목표 기대치 계산
    var expectedTarget = (mtarget / totalworkingday) * elapsedworkingday;

    // 2. 진도율 계산 (0으로 나누기 방지 처리)
    var progressrate = 0;
    if (expectedTarget > 0) {
        progressrate = (msuccess / expectedTarget) * 100;
    }

    mprogress.text(progressrate.toFixed(2) + '%');
});
   //$lib.rangecopy('.tg');
   $('#c2tablecopy').click(function() {
    $lib.rangecopy('#cs2table');})
  
    $('#c1tablecopy').click(function() {
    $lib.rangecopy('#cs1table');})

    $('.colorchange').each(function(idx,ele){
            var eleval = ele.textContent;
            var lastkey = eleval.slice(-1);
            var this_data = $(this).attr('data-color');
            if(lastkey == this_data){ $(this).css('background-color','#2563eb').css('color','white'); }
        }) // 달성율에 따른 색상 변경

    </script>
</body>
</html>