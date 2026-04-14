<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname'] ?? '';
$Msuccess = $_POST['Msuccess'] ?? '';
$ITsuccess = $_POST['ITsuccess'] ?? '';
$newITsuccess = $_POST['newITsuccess'] ?? '';
$nowtime = $_POST['nowtime'] ?? '';

// 업데이트할 항목들을 담을 배열 생성
$updates = [];

// 1. 모바일 실적: 값이 비어있지 않을 때만 업데이트 항목에 추가
if ($Msuccess !== '') {
    $updates[] = "m_success = '$Msuccess'";
}

// 2. IT 실적: 값이 비어있지 않을 때만 업데이트 항목에 추가
if ($ITsuccess !== '') {
    $updates[] = "it_success = '$ITsuccess'";
}

// 3. 새로운 IT 실적: 값이 비어있지 않을 때만 업데이트 항목에 추가
if ($newITsuccess !== '') {
    $updates[] = "newit_itsuccess = '$newITsuccess'";
}

// 4. 입력 시간: 값이 비어있지 않을 때만 업데이트 항목에 추가
if ($nowtime !== '') {
    $updates[] = "todaytime = '$nowtime'";
}

// 업데이트할 내용이 있는 경우에만 쿼리 실행
if (count($updates) > 0 && !empty($teamname)) {
    
    // 배열에 담긴 항목들을 쉼표(,)로 연결하여 SQL 문장 완성
    $update_query = implode(', ', $updates);
    
    $sql = "UPDATE c2sales_month SET $update_query WHERE teamname = '$teamname'";

    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo '저장하지 못했습니다.';
        error_log(mysqli_error($conn)); 
    } else {
        echo "
        <script>
            location.href ='index.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('입력된 정보가 없거나 팀이 선택되지 않았습니다.');
        history.back();
    </script>
    ";
}
?>
