<?php 

/*$date = $_POST['inputdate']??"";
$question = $_POST['question']??"";
$answer = $_POST['answer']??"";
$tip = $_POST['tip']??"";  */


// 데이터베이스 연결
include('phpgate.php');

// INSERT 문 작성
$sql = "INSERT INTO knowhow (inputdate, question, answer, tip) VALUES (?, ?, ?, ?)";

// Prepared Statement 생성
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind Parameter
    // 각 매개변수의 데이터 타입을 지정 ('s'는 string, 'i'는 integer 등)
    mysqli_stmt_bind_param($stmt, "ssss", $date, $question, $answer, $tip);

    // 폼 데이터에서 변수 가져오기
    $date = $_POST['inputdate'] ?? "";
    $question = $_POST['question'] ?? "";
    $answer = $_POST['answer'] ?? "";
    $tip = $_POST['tip'] ?? "";

    // 실행
    if (mysqli_stmt_execute($stmt)) {
        echo "데이터가 성공적으로 삽입되었습니다!";
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




