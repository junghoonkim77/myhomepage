<?php
// 사용자가 보낸 비번 받기
$user_pw = $_POST['pw'] ?? '';

// 내가 지정한 정답 비번
$correct_pw = "1234"; 

if ($user_pw === $correct_pw) {
    // 조건이 맞으면 특정 파일 포함 (예: secret_content.php)
    include 'gate copy.html';
    
} else {
    // 틀렸을 경우 메시지 출력
    echo "<p style='color:red;'>비밀번호가 틀렸습니다. 접근 권한이 없습니다.</p>";
}
?>