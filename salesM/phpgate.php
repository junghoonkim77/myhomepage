<?php
// 데이터베이스 정보를 배열로 설정
$databases = [
    'folkball.dothome.co.kr' => [
        'user' => 'folkball',
        'password' => 'amho73032721!',
        'dbname' => 'folkball'
    ],
    'localhost' => [
        'user' => 'root',
        'password' => 'amho73032721',
        'dbname' => 'abc_corp'
    ],
    'folkball.mycafe24.com' => [ // Cafe24 접속 도메인
        'user' => 'folkball',
        'password' => 'emfkdlsk77!',
        'dbname' => 'folkball' // Cafe24는 기본적으로 DB명이 아이디와 동일합니다
    ]
];

// 서버의 도메인 이름을 가져옴
$serverName = $_SERVER['SERVER_NAME'];

// 도메인 이름에 따라 데이터베이스 선택
if (array_key_exists($serverName, $databases)) {
    $selectedDB = $databases[$serverName];
} else {
    die("서버 설정에 맞는 데이터베이스 정보가 없습니다. 현재 접속 도메인: " . $serverName);
}

// 선택된 데이터베이스에 대한 연결 시도 (Cafe24도 기본 호스트는 localhost를 사용합니다)
$conn = mysqli_connect('localhost', 
                       $selectedDB['user'], 
                       $selectedDB['password'], 
                       $selectedDB['dbname']);

// 연결 성공 여부 확인
if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

echo "<script>
console.log('연결성공')
</script>";
?>