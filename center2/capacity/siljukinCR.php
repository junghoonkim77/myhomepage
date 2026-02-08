<?php
include('phpgate.php');

$sql = "CREATE TABLE team_performance (
    `order` INT AUTO_INCREMENT PRIMARY KEY COMMENT '자동 증가 순번',
    `inputday` DATE NOT NULL COMMENT '입력 날짜',
    `cunsulname` VARCHAR(100) NOT NULL COMMENT '팀원명',
    `nowteam` VARCHAR(100) NOT NULL COMMENT '팀명',
    `cpd` INT DEFAULT 0 COMMENT '콜 실적(건수)',
    `att` VARCHAR(20) COMMENT '통화 시간(ATT)',
    `acw` VARCHAR(20) COMMENT '후처리 시간(ACW)',
    `calltime` VARCHAR(20) COMMENT '총 콜 시간',
    
    -- 인터넷 실적 섹션
    `trycount` INT DEFAULT 0 COMMENT '인터넷 권유 시도 건수',
    `tryrate` DECIMAL(5, 2) GENERATED ALWAYS AS (
        CASE WHEN `cpd` > 0 THEN (`trycount` / `cpd`) * 100 ELSE 0 END
    ) STORED COMMENT '인터넷 권유 시도율(%)',
    `trysuccess` INT DEFAULT 0 COMMENT '인터넷 권유 성공 건수',
    `trygood` INT DEFAULT 0 COMMENT '인터넷 실제 가설 건수',
    
    -- 모바일 실적 섹션
    `mtrycount` INT DEFAULT 0 COMMENT '모바일 권유 시도 건수',
    `mtryrate` DECIMAL(5, 2) GENERATED ALWAYS AS (
        CASE WHEN `cpd` > 0 THEN (`mtrycount` / `cpd`) * 100 ELSE 0 END
    ) STORED COMMENT '모바일 권유 시도율(%)',
    `mtrysuccess` INT DEFAULT 0 COMMENT '모바일 권유 성공 건수',
    `mtrygood` INT DEFAULT 0 COMMENT '모바일 실제 가설 건수',
    
    -- 분석 섹션
    `analysys` LONGTEXT COMMENT '실적 자가 분석(텍스트, 기호 등)',
    
    -- 인덱스 설정 (조회 성능 최적화)
    INDEX idx_inputday (inputday),
    INDEX idx_team_name (nowteam, cunsulname)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

$result =  mysqli_query($conn,$sql);


?>