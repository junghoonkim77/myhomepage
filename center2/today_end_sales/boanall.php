<?php 
include('phpgate.php');
echo "<br>";
echo "모든 팀 보안 점검 결과 일괄 저장 중입니다...";

// 공통 데이터 설정
$boanresult = "이상 무";
$weekday = date('l'); 
$days = ["Monday" => "월", "Tuesday" => "화", "Wednesday" => "수", "Thursday" => "목", "Friday" => "금", "Saturday" => "토", "Sunday" => "일"];
$inputday = date('m월/d일').'('.$days[$weekday].')'.' 18시';

$teams = ['무1', '무2', '무3', '무4', '무5', '통품'];
$successCount = 0;

foreach ($teams as $teamname) {
    // 각 팀별로 UPDATE 쿼리 실행
    $sql = "UPDATE dailyboan 
            SET boanresult = '$boanresult', inputday = '$inputday' 
            WHERE teamname = '$teamname'";
    
    if(mysqli_query($conn, $sql)) {
        $successCount++;
    }
}

if($successCount === count($teams)){
    echo "
    <script>
       alert('모든 팀 보안 점검이 완료되었습니다.');
       location.href ='index.php';
    </script>
    ";
} else {
    echo "일부 팀의 정보를 저장하지 못했습니다.";
    echo "<br><a href='index.php'>돌아가기</a>";
}

mysqli_close($conn);
?>