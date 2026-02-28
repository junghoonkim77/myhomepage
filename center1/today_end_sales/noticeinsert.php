<?php
include ('phpgate.php'); // 여기서 $conn 변수가 생성됩니다.

try {
    // 1. POST 데이터 수신
    $teamname = $_POST['noticeteam'] ?? '';
    $regiday  = $_POST['regtime'] ?? '';
    $noticon  = $_POST['noticecontent'] ?? '';

    // 2. 데이터 검증
    if (empty($teamname) || empty($noticon)) {
        echo "<script>alert('팀 선택과 공지 내용은 필수입니다.'); history.back();</script>";
        exit;
    }

    // 3. mysqli용 Prepared Statement 작성
    // $pdo->prepare 대신 $conn->prepare를 사용합니다.
    $stmt = $conn->prepare("INSERT INTO cs1noti (teamname, regiday, noticon) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        throw new Exception($conn->error);
    }

    // 4. 파라미터 바인딩 (s = string, 총 3개의 문자열 데이터)
    // 이 과정에서 모든 특수문자가 안전하게 처리됩니다.
    $stmt->bind_param("sss", $teamname, $regiday, $noticon);

    // 5. 실행
    if ($stmt->execute()) {
        echo "<script>alert('공지가 성공적으로 등록되었습니다.'); location.href='index.php';</script>";
    } else {
        throw new Exception($stmt->error);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    // 오류 발생 시 메시지 출력
    die("DB 오류: " . $e->getMessage());
}
?>