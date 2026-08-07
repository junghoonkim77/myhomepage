<?php 
include('phpgate.php');

// 1. 데이터 조회 쿼리만 실행 (COUNT 쿼리 제거로 최적화)
$sql = "SELECT * FROM vocbank";
$result = $conn->query($sql);

// 결과 개수를 통해 총 행수 파악
$total_rows = $result ? $result->num_rows : 0;
$vocurl = "../통품voc은행/";
$td = "";

if ($total_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // 보안 및 문자열 깨짐 방지를 위한 이스케이프 처리
        $safe_url = htmlspecialchars($vocurl . $row['url'], ENT_QUOTES, 'UTF-8');
        $safe_num = htmlspecialchars($row['num'], ENT_QUOTES, 'UTF-8');
        $safe_title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');

        // HTML 가독성 및 따옴표 속성 오류 수정
        $td .= "<div>";
        $td .= "<a href='{$safe_url}' target='frame'>";
        $td .= "<span class='dbnum'>[{$safe_num}]</span>{$safe_title}";
        $td .= "</a>";
        $td .= "</div>";
    }
} 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <!-- 모바일 최적화를 위한 뷰포트 메타 태그 (필수) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>통품VOC은행</title> 
    <style>
        /* 기본 여백 초기화 및 모바일 친화적 폰트 설정 */
        body, html {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        h4 {
            margin: 0;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .addvoc {
            opacity: 0; /* 기존 속성 유지 */
            font-size: 12px;
        }

        .container {
            display: flex;
            flex-direction: column;
        }

        /* [모바일 핵심 1] Iframe 영역을 화면 상단 40%에 고정 */
        .basicframe1 {
            position: sticky;
            top: 0;
            width: 100%;
            height: 40vh; /* 화면 높이의 40% */
            background-color: #fff;
            z-index: 100;
            border-bottom: 2px solid #ccc;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        iframe {
            width: 100%;
            height: 100%;
            display: block;
        }

        .basicframe {
            width: 100%;
        }

        /* [모바일 핵심 2] 검색창 및 버튼 영역을 Iframe 바로 아래(40vh 위치)에 고정 */
        .divhead {
            position: sticky;
            top: 40vh; 
            background-color: #f8f9fa;
            z-index: 90;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 4px 6px -4px rgba(0,0,0,0.1);
        }

        .divhead-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-group button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            margin-left: 4px;
        }
        
        .btn-group button:active {
            background-color: #0056b3;
        }

        /* iOS에서 폼 클릭 시 자동 확대 방지를 위해 폰트 사이즈 16px 이상 적용 */
        #searchInput {
            width: 100%;
            padding: 10px;
            font-size: 16px; 
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        /* [모바일 핵심 3] 터치하기 편하도록 리스트를 1단으로 변경 */
        .divTableBody {
            display: grid;
            grid-template-columns: 1fr; /* 1단 구성 */
            gap: 8px;
            padding: 15px;
        }

        .divTableBody > div { 
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            overflow: hidden;
        }

        a {
            text-decoration: none;
            display: block;
            padding: 15px; /* 터치 영역 확장 */
            color: #333;
            font-size: 15px;
            line-height: 1.4;
            word-break: keep-all;
        }

        a:active {
            background-color: #e9ecef; /* 모바일 클릭(터치) 피드백 */
        }

        .dbnum {
            color: #007bff;
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <h4>통품voc은행 <a class="addvoc" href="vocinsert.html">voc추가</a></h4> 
    
    <div class="container">
        <!-- 모바일 레이아웃 자연스러운 배치를 위해 basicframe1(Iframe)을 위로 올렸습니다. 기능엔 영향이 없습니다. -->
        <div class="basicframe1">
            <iframe src="" name="frame" style="border:none"></iframe>
        </div>

        <div class="basicframe">
            <!-- 인라인 스타일을 제거하고 CSS 클래스로 모두 제어하도록 변경했습니다. -->
            <div class="divhead">
                <div class="divhead-top">
                    <div><span>현 등록건수: <?php echo $total_rows . "건"; ?></span></div>
                    <div class="btn-group">
                        <button class="button1">최하단⏬</button>
                        <button class="button2">최상단⏫</button>
                    </div>
                </div>
                <div>
                    <input type="text" id="searchInput" placeholder="검색어를 입력하세요">
                </div>
            </div>
            
            <div class="divTableBody">
                <?php echo $td; ?>
            </div>
        </div>
    </div>
     
    <script src="../java/voc_bank.js"></script>
    <script>
        jQuery(document).ready(function($) {
            // 1. 최하단 이동
            $('.button1').click(function() {
                var basicframeHi = $('.basicframe').height();
                $('html, body').stop().animate({ scrollTop: basicframeHi }, 400);
            });

            // 2. 최상단 이동
            $('.button2').click(function() {
                $('html, body').stop().animate({ scrollTop: '0px' }, 400);
            });  

            // 3. 실시간 다중 키워드 검색 기능 구현 (AND 검색)
            $('#searchInput').on('keyup', function() {
                // 입력값의 앞뒤 공백을 제거하고 소문자로 변환
                var value = $(this).val().toLowerCase().trim();
                
                // 입력값이 빈 자백일 때는 모든 항목을 보여줌
                if (value === "") {
                    $(".divTableBody > div").show();
                    return;
                }
                
                // 공백(하나 이상)을 기준으로 단어를 쪼개어 배열로 만듦
                var keywords = value.split(/\s+/);
                
                // divTableBody 직계 자식인 div들을 대상으로 필터링
                $(".divTableBody > div").each(function() {
                    var text = $(this).text().toLowerCase();
                    
                    // 작성한 모든 키워드가 text에 포함되어 있는지 확인 (AND 조건)
                    var isMatch = keywords.every(function(keyword) {
                        return text.indexOf(keyword) > -1;
                    });
                    
                    // 조건 충족 여부에 따라 보이기/숨기기 처리
                    $(this).toggle(isMatch);
                });
            });
        });
    </script> 
</body>
</html>
