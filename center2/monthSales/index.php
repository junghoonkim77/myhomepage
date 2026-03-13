<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('phpgate.php');

// ... (기본 PHP 로직 유지) ...

$teams = ['무1', '무2', '무3', '무4', '무5', '통품','유1','유2'];
$teamData = [];
$teamboan = [];
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

// 근무일 계산 코드
$year = date('Y');         // 올해 (2026)
$month = date('m');        // 이번 달 (03)
$today = date('Y-m-d');    // 오늘 날짜
$my_holidays = ['2026-03-02'];
$last_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 이번 달의 마지막 날짜
$total_working_days = 0; // 이번 달 전체 근무일
$remaining_days = 0;     // 남은 근무일

for ($day = 1; $day <= $last_day; $day++) {
    // 날짜를 '2026-03-01' 형식으로 만듭니다.
    $date_string = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    $day_of_week = date('N', strtotime($date_string)); // 요일 (1:월 ~ 7:일)

    // 주말(토:6, 일:7)이 아니고, 내가 지정한 휴무일 배열에 없는 경우에만 '근무일'
    if ($day_of_week < 6 && !in_array($date_string, $my_holidays)) {
        
        $total_working_days++; // 이번 달 총 근무일수 증가

        // 그 근무일이 오늘보다 미래이거나 오늘인 경우 '남은 근무일'로 카운트
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
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>cs2센터 누적실적</title>
</head>
<body>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
          overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
          font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
        .tg .tg-46o7{background-color:#000000;border-color:inherit;color:#ffffff;text-align:center;vertical-align:middle}
        .tg .tg-ikxu{background-color:#000000;color:#ffffff;text-align:center;vertical-align:middle}
        .tg .tg-nrix{text-align:center;vertical-align:middle}
        
        .container {display : flex; flex-direction: row; justify-content: center; margin-top: 2rem; }
        
        .cs2centerdash { margin-right : 4rem;  }

         h3{ text-align: center; }

         #goal { text-align: center;}
        </style>
      <div class="headbox">
        <h3>CS1,2센터 <span id="nowmonth">3</span>월 누적 실적창</h3>
        
        <div id="goal">
          <span data-totalwork="<?php echo $total_working_days; ?>" class="totalworkingday"><?php echo $month."월 총 영업일:".$total_working_days; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
          <span data-remainwork="<?php echo $remaining_days; ?>" class="remainworkingday"><?php echo "잔여 영업일:".$remaining_days; ?></span>
        </div>
      
      </div>
      <div class="container">
        <div class="cs2centerdash"> <!-- cs2센터 대쉬박스 시작-->
          <h4>CS2센터 누적 실적</h4>
          <table class="tg"><thead>
            <tr>
              <th class="tg-46o7" rowspan="2">팀<br></th>
              <th class="tg-46o7" colspan="4">M가입기회발굴</th>
              <th class="tg-46o7" colspan="4">IT가입기회발굴<br></th>
              <th class="tg-46o7">-<br></th>
            </tr>
            <tr>
              <th class="tg-46o7">목표</th>
              <th class="tg-46o7">개통</th>
              <th class="tg-46o7">진도율</th>
              <th class="tg-46o7">달성율</th>
              <th class="tg-46o7">목표</th>
              <th class="tg-ikxu">개통</th>
              <th class="tg-ikxu">진도율</th>
              <th class="tg-46o7">달성율</th>
              <th class="tg-46o7">입력일시</th>
            </tr></thead>
          <tbody>
            <tr>
              <td class="tg-9wq8">무선일반1팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $mu1[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $mu1[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $mu1[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $mu1[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $mu1[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">무선일반2팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $mu2[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $mu2[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $mu2[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $mu2[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $mu2[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">무선일반3팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $mu3[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $mu3[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $mu3[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $mu3[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $mu3[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">무선일반4팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $mu4[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $mu4[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $mu4[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $mu4[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $mu4[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">무선일반5팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $mu5[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $mu5[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $mu5[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $mu5[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $mu5[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">통화품질팀</td>
              <td class="tg-9wq8 mtarget"><?php echo $tong[0]; ?></td>
              <td class="tg-9wq8 msuccess"><?php echo $tong[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 ITtarget"><?php echo $tong[2]; ?></td>
              <td class="tg-nrix ITsuccess"><?php echo $tong[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $tong[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">계</td>
              <td class="tg-9wq8 mtargetTotal"></td>
              <td class="tg-9wq8 msuccessTotal"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 comRate"></td>
              <td class="tg-9wq8 ITtargetTotal"></td>
              <td class="tg-nrix ITsuccessTotal"></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8 itcomRate"></td>
              <td class="tg-9wq8">-</td>
            </tr>
          </tbody>
      </table>
     <form action="successInsert.php" method="post" id="successInsert">
      <fieldset>
      <legend>무선팀 개통실적 입력메뉴 </legend>
      <p>
       
          <label for="mteamname">팀명 선택</label>
          <select name="teamname" id="mteamname">
            <option value="">팀선택</option>
            <option value="무1">무선1</option>
            <option value="무2">무선2</option>
            <option value="무3">무선3</option>
            <option value="무4">무선4</option>
            <option value="무5">무선5</option>
            <option value="통품">통품</option>
          </select>
        </p>
        <p>
            <label for="">M개통 누적실적</label>
            <input type="number" id = "Mgoal" name="Msuccess" >
        </p>
        <p>
          <label for="">IT개통 누적실적</label>
          <input type="number" id = "ITgoal" name="ITsuccess" >
        </p>
          <input type="hidden" name="nowtime" value="<?php echo date('d일H:i:s').$days[$weekday]; ?>">
         <button>개통실적 제출</button>
        
    </fieldset> 
    </form>
    
    <form action="goalinsert.php" method="post" name="">
    <fieldset>
      <legend>무선팀 목표 입력메뉴</legend>
     
    <p>
      
        <label for="teamname">팀명 선택</label>
        <select name="teamname" id="m1teamname">
          <option value="">팀선택</option>
          <option value="무1">무선1</option>
          <option value="무2">무선2</option>
          <option value="무3">무선3</option>
          <option value="무4">무선4</option>
          <option value="무5">무선5</option>
          <option value="통품">통품</option>
        </select>
      </p>
      <p>
          <label for="Mtarget">M개통목표</label>
          <input type="number" id = "Mtarget" name="Mtarget" >
      </p>
      <p>
        <label for="ITtarget">IT개통목표</label>
        <input type="number" id = "ITtarget" name="ITtarget" >
    </p>
       <button>개통목표 제출</button>
     
    </fieldset> 
     </form>
  </div> <!-- cs2센터 대쉬박스 끝-->
        <div class="cs1centerdash"> <!-- cs2센터 대쉬박스 시작-->
          <h4>CS1센터 누적 실적</h4>
          <table class="tg"><thead>
            <tr>
              <th class="tg-46o7" rowspan="2">팀<br></th>
              <th class="tg-46o7" colspan="4">M가입기회발굴</th>
              <th class="tg-46o7" colspan="4">IT가입기회발굴<br></th>
              <th class="tg-46o7">-<br></th>
            </tr>
            <tr>
              <th class="tg-46o7">목표</th>
              <th class="tg-46o7">개통</th>
              <th class="tg-46o7">진도율</th>
              <th class="tg-46o7">달성율</th>
              <th class="tg-46o7">목표</th>
              <th class="tg-ikxu">개통</th>
              <th class="tg-ikxu">진도율</th>
              <th class="tg-46o7">달성율</th>
              <th class="tg-46o7">입력일시</th>
            </tr></thead>
          <tbody>
            <tr>
              <td class="tg-9wq8">유선1팀</td>
              <td class="tg-9wq8 Wmtarget"><?php echo $wire1[0]; ?></td>
              <td class="tg-9wq8 Wmsuccess"><?php echo $wire1[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 WITtarget"><?php echo $wire1[2]; ?></td>
              <td class="tg-nrix WITsuccess"><?php echo $wire1[3]; ?></td>
              <td class="tg-nrix WITprogress"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $wire1[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">유선2팀</td>
              <td class="tg-9wq8 Wmtarget"><?php echo $wire2[0]; ?></td>
              <td class="tg-9wq8 Wmsuccess"><?php echo $wire2[1]; ?></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 WITtarget"><?php echo $wire2[2]; ?></td>
              <td class="tg-nrix WITsuccess"><?php echo $wire2[3]; ?></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8"><?php echo $wire2[4]; ?></td>
            </tr>
            <tr>
              <td class="tg-9wq8">계</td>
              <td class="tg-9wq8 WmtargetTotal"></td>
              <td class="tg-9wq8 WmsuccessTotal"></td>
              <td class="tg-9wq8"></td>
              <td class="tg-9wq8 wcomrate"></td>
              <td class="tg-9wq8 WITtargetTotal"></td>
              <td class="tg-nrix WITsuccessTotal"></td>
              <td class="tg-nrix"></td>
              <td class="tg-9wq8 witcomrate"></td>
              <td class="tg-9wq8">-</td>
            </tr>
          </tbody>
        </table>
      <form action="successInsert.php" method="post">
      <fieldset>
        <legend>유선팀 개통실적 입력메뉴</legend>
     
       
          <label for="wteamname">팀명 선택</label>
          <select name="teamname" id="wteamname">
            <option value="">팀선택</option>
            <option value="유1">유선1</option>
            <option value="유2">유선2</option>
         </select>
        </p>
        <p>
            <label for="wMgoal">M개통 누적실적</label>
            <input type="number" id = "wMgoal" name="Msuccess" >
        </p>
        <p>
          <label for="">IT개통 누적실적</label>
          <input type="number" id = "wITgoal" name="ITsuccess" >
      </p>
      <input type="hidden" name="nowtime" value="<?php echo date('d일H:i:s').$days[$weekday]; ?>">
         <button>개통실적 제출</button>
        
    </fieldset>
    </form>
    
    <form action="goalinsert.php" method="post">    
    <fieldset>
      <legend>유선팀 목표 입력메뉴</legend>
      <p>
         <label for="w1teamname">팀명 선택</label>
          <select name="teamname" id="w1teamname">
            <option value="">팀선택</option>
            <option value="유1">유선1</option>
            <option value="유2">유선2</option>
          </select>
        </p>
        <p>
            <label for="wMtarget">M개통목표</label>
            <input type="number" id = "wMtarget" name="Mtarget" >
        </p>
        <p>
          <label for="wITtarget">IT개통목표</label>
          <input type="number" id = "wITtarget" name="ITtarget" >
      </p>
         <button>개통목표 제출</button>
        </fieldset>  
    </form>
        </div>
    
       
      </div>
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

    $('tr > .msuccess').each(function() {
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
     
  // 무선 IT진도율 계산
 $('tr > .ITsuccess').each(function() {
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

 //유선 M진도율 계산
 $('tr > .Wmsuccess').each(function() {
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

    // 유선 IT진도율 계산
$('tr > .WITsuccess').each(function() {
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
    </script>
</body>
</html>