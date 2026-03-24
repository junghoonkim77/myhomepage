<?php 
include('phpgate.php');
echo "<br>";
echo "저장중입니다.";

$teamname = $_POST['teamname'] ?? '';
$Mtarget = $_POST['Mtarget'] ?? '';
$ITtarget = $_POST['ITtarget'] ?? '';

// 업데이트할 항목들을 담을 배열
$update_parts = [];

// M목표 값이 있을 때만 업데이트 목록에 추가
if ($Mtarget !== '') {
    $update_parts[] = "m_goal = '$Mtarget'";
}

// IT목표 값이 있을 때만 업데이트 목록에 추가
if ($ITtarget !== '') {
    $update_parts[] = "it_goal = '$ITtarget'";
}

// 업데이트할 내용이 있는 경우에만 쿼리 실행
if (count($update_parts) > 0 && !empty($teamname)) {
    // 배열에 담긴 항목들을 쉼표(,)로 연결 (예: m_goal = '10', it_goal = '20')
    $set_sql = implode(', ', $update_parts);
    
    $sql = "UPDATE c2sales_month SET $set_sql WHERE teamname = '$teamname'";
    $result = mysqli_query($conn, $sql);

    if($result === false){
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
    echo "수정할 데이터가 없거나 팀이 선택되지 않았습니다.";
    echo "<script>setTimeout(function(){ location.href='index.php'; }, 2000);</script>";
}
?>