<?php 
include ('phpgate.php');


$teams = ['무1', '무2', '무3', '무4', '무5', '통품'];
$teamData = [];

foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT it_tend , m_end , tri_end , success_end , todaytime FROM c2sales_end WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['인티' => $row['it_tend'], '모바일' => $row['m_end'], '통리' => $row['tri_end'], '가설' => $row['success_end'] ,'시간' => $row['todaytime']];
    }
}


$mu1 = [$teamData['무1'][0]['인티'], $teamData['무1'][0]['모바일'], $teamData['무1'][0]['통리'], $teamData['무1'][0]['가설'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['인티'], $teamData['무2'][0]['모바일'], $teamData['무2'][0]['통리'], $teamData['무2'][0]['가설'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['인티'], $teamData['무3'][0]['모바일'], $teamData['무3'][0]['통리'], $teamData['무3'][0]['가설'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['인티'], $teamData['무4'][0]['모바일'], $teamData['무4'][0]['통리'], $teamData['무4'][0]['가설'],$teamData['무4'][0]['시간']];
$mu5 = [$teamData['무5'][0]['인티'], $teamData['무5'][0]['모바일'], $teamData['무5'][0]['통리'], $teamData['무5'][0]['가설'],$teamData['무5'][0]['시간']];
$tong = [$teamData['통품'][0]['인티'], $teamData['통품'][0]['모바일'], $teamData['통품'][0]['통리'], $teamData['통품'][0]['가설'],$teamData['통품'][0]['시간']];


$weekday = date('l'); // full 요일 (예: Monday)

// 한글 요일로 변환
$days = [
    "Monday" => "월",
    "Tuesday" => "화",
    "Wednesday" => "수",
    "Thursday" => "목",
    "Friday" => "금",
    "Saturday" => "토",
    "Sunday" => "일"
];

?>

 
    <script>

    </script>

</body>

</html>