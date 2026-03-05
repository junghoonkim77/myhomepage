<?php
// insert.php
// - voc_input.html 폼에서 POST로 넘어온 데이터를 voc_table에 저장합니다.
// - 특수문자/따옴표/줄바꿈 문제를 피하기 위해 Prepared Statement를 사용합니다.

declare(strict_types=1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include('phpgate.php'); // 여기서 $conn = new mysqli(...) 가 준비되어 있어야 합니다.

try {
    // UTF-8(utf8mb4)로 통일 (이 설정이 있어야 이모지/특수문자도 안전합니다)
    $conn->set_charset('utf8mb4');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo "허용되지 않은 요청입니다. (POST만 허용)";
        exit;
    }

    // 입력값 가져오기 (빈 값은 NULL 처리)
    $vocno_raw = isset($_POST['vocno']) ? trim((string)$_POST['vocno']) : '';
    $vocno = ($vocno_raw === '') ? null : (int)$vocno_raw;

    $vocseper = isset($_POST['vocseper']) ? trim((string)$_POST['vocseper']) : null;
    $voc1cha  = isset($_POST['voc1cha'])  ? trim((string)$_POST['voc1cha'])  : null;
    $voc2cha  = isset($_POST['voc2cha'])  ? trim((string)$_POST['voc2cha'])  : null;
    $voc3cha  = isset($_POST['voc3cha'])  ? trim((string)$_POST['voc3cha'])  : null;
    $voc4cha  = isset($_POST['voc4cha'])  ? trim((string)$_POST['voc4cha'])  : null;

    // TEXT 컬럼: 줄바꿈/특수문자 포함 가능하므로 그대로 받되, 빈 값은 NULL로
    $con_meaning = isset($_POST['con_meaning']) ? (string)$_POST['con_meaning'] : null;
    $common      = isset($_POST['common'])      ? (string)$_POST['common']      : null;
    $wire        = isset($_POST['wire'])        ? (string)$_POST['wire']        : null;
    $wireless    = isset($_POST['wireless'])    ? (string)$_POST['wireless']    : null;

    // 빈 문자열을 NULL로 바꿔 저장하고 싶으면 아래 헬퍼를 사용
    $emptyToNull = function ($v) {
        if ($v === null) return null;
        $t = trim($v);
        return ($t === '') ? null : $v; // TEXT는 원문 유지 (앞뒤 공백만 보고 NULL 처리)
    };

    $vocseper    = $emptyToNull($vocseper);
    $voc1cha     = $emptyToNull($voc1cha);
    $voc2cha     = $emptyToNull($voc2cha);
    $voc3cha     = $emptyToNull($voc3cha);
    $voc4cha     = $emptyToNull($voc4cha);
    $con_meaning = $emptyToNull($con_meaning);
    $common      = $emptyToNull($common);
    $wire        = $emptyToNull($wire);
    $wireless    = $emptyToNull($wireless);

    $sql = "INSERT INTO voc_table
        (vocno, vocseper, voc1cha, voc2cha, voc3cha, voc4cha, con_meaning, common, wire, wireless)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // bind_param은 null을 직접 잘 못 다루는 경우가 있어, i/s 타입으로 바인딩하되
    // NULL은 'null'로 세팅하면 mysqli가 NULL로 전송합니다(아래처럼 변수를 그대로 두면 OK).
    // 타입 문자열: vocno(i) + 나머지 9개(s)
    $stmt->bind_param(
        "isssssssss",
        $vocno,
        $vocseper,
        $voc1cha,
        $voc2cha,
        $voc3cha,
        $voc4cha,
        $con_meaning,
        $common,
        $wire,
        $wireless
    );

    $stmt->execute();

    $newId = $stmt->insert_id; // AUTO_INCREMENT PK(sroder)

    // 간단한 성공 페이지 출력
    $safeId = htmlspecialchars((string)$newId, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    echo "<!doctype html><html lang='ko'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "<title>저장 완료</title><style>body{font-family:system-ui;margin:24px;max-width:900px}a{color:#0b57d0}</style></head><body>";
    echo "<h2>저장 완료 ✅</h2>";
    echo "<p>저장된 sroder(PK): <b>{$safeId}</b></p>";
    echo "<p><a href='voc_input.html'>입력 폼으로 돌아가기</a></p>";
    echo "</body></html>";

} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    $msg = htmlspecialchars($e->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    echo "<!doctype html><html lang='ko'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "<title>오류</title><style>body{font-family:system-ui;margin:24px;max-width:900px}pre{white-space:pre-wrap;background:#f6f6f6;padding:12px;border-radius:10px}</style></head><body>";
    echo "<h2>저장 중 오류가 발생했어요 ❌</h2>";
    echo "<pre>{$msg}</pre>";
    echo "<p><a href='voc_input.html'>입력 폼으로 돌아가기</a></p>";
    echo "</body></html>";
} finally {
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>