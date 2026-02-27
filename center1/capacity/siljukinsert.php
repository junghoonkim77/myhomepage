<?php 
include('phpgate.php');;

// 1. POST 데이터 수신 및 변수 지정
// 값이 비어있을 경우를 대비해 기본값(0 또는 빈 문자열)을 설정합니다.
$inputday    = $_POST['inputday'];
$cunsulname  = $_POST['cunsulname'];
$nowteam     = $_POST['nowteam'];
$cpd         = (int)$_POST['cpd'];
$att         = $_POST['att'] ?? '00:00:00';
$acw         = $_POST['acw'] ?? '00:00:00';
$calltime    = $_POST['calltime'] ?? '00:00:00';

$trycount    = (int)$_POST['trycount'];
$trysuccess  = (int)$_POST['trysuccess'];
$trygood     = (int)$_POST['trygood'];

$mtrycount   = (int)$_POST['mtrycount'];
$mtrysuccess = (int)$_POST['mtrysuccess'];
$mtrygood    = (int)$_POST['mtrygood'];

$analysys    = $_POST['analysys'];

// 2. SQL 쿼리 준비 (생성된 컬럼 tryrate, mtryrate는 제외)
$sql = "INSERT INTO team_performance (
            inputday, cunsulname, nowteam, cpd, att, acw, calltime, 
            trycount, trysuccess, trygood, 
            mtrycount, mtrysuccess, mtrygood, 
            analysys
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// 3. Prepared Statement 실행
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // 데이터 타입: s(문자열), i(정수)
    // 순서대로: inputday(s), cunsulname(s), nowteam(s), cpd(i), att(s), acw(s), calltime(s), try(i,i,i), mtry(i,i,i), analysys(s)
    mysqli_stmt_bind_param($stmt, "sssisssiiiiiis", 
        $inputday, $cunsulname, $nowteam, $cpd, $att, $acw, $calltime,
        $trycount, $trysuccess, $trygood,
        $mtrycount, $mtrysuccess, $mtrygood,
        $analysys
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('성공적으로 저장되었습니다.'); location.href='inputgate.php';</script>";
    } else {
        echo "실행 오류: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "쿼리 준비 오류: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
