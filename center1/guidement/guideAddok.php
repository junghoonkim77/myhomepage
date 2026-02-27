<?php 
include ('phpgate.php');




// INSERT 문 작성
$sql = "INSERT INTO guidement (casessort, cases, content) VALUES (?, ?, ?)";

// Prepared Statement 생성
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind Parameter
    // 각 매개변수의 데이터 타입을 지정 ('s'는 string, 'i'는 integer 등)
    mysqli_stmt_bind_param($stmt, "sss", $casessort, $cases, $content);

    // 폼 데이터에서 변수 가져오기
    $casessort = $_POST['casessort'] ?? "";
    $cases = $_POST['cases'] ?? "";
    $content = $_POST['content'] ?? "";
    

    // 실행
    if (mysqli_stmt_execute($stmt)) {
        echo "데이터가 성공적으로 삽입되었습니다!";
        echo "<a href='index.php'>멘트 가이드 창 돌아가기</a>";
    } else {
        echo "오류: " . mysqli_error($conn);
    }

    // Statement 닫기
    mysqli_stmt_close($stmt);
} else {
    echo "Prepared Statement를 생성할 수 없습니다: " . mysqli_error($conn);
}

// 데이터베이스 연결 닫기
mysqli_close($conn);
?>

