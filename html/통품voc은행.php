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
    <title>통품VOC은행</title> 
    <style>
        .divhead {
            display: inline-block;
            border: 1px solid gray;
        }
        .divTableBody {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: auto;
            font-size: 12px;
        }
        .divTableBody > div { 
            border: 1px solid gray;
        }
        a {
            text-decoration: none;
            display: block; /* 클릭 영역 확장을 위해 추가 */
            padding: 5px;
        }
        a:hover {
            background-color: hsl(120, 75%, 81%);
        }
        button {
            background-color: aqua;
            cursor: pointer;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            grid-template-rows: auto;
        }
        iframe {
            width: 600px;
            height: 100vh;  
            position: sticky;
            top: 50px;
        }
        .addvoc {
            opacity: 0;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <h4>통품voc은행 <a class="addvoc" href="vocinsert.html">voc추가</a></h4> 
    
    <div class="container">
        <div class="basicframe">
            <div class="divhead" style="position: sticky; top: 0; background-color: white; z-index: 1; width: 100%;">
                <div>
                    <div>
                        <div><span>현 등록건수: <?php echo $total_rows . "건"; ?></span></div>
                        <div>
                            <button class="button1">최하단이동⏬</button>
                            <button class="button2">최상단이동⏫</button> <!-- 기존 스크립트에 있던 button2 추가 -->
                        </div>
                    </div>
                </div>
                <div style="padding: 10px;">
                    <input type="text" id="searchInput" placeholder="검색어를 입력하세요" style="width: 90%;">
                </div>
            </div>
            
            <div class="divTableBody">
                <?php echo $td; ?>
            </div>
        </div>
        
        <div class="basicframe1">
            <iframe src="" name="frame" style="border:none"></iframe>
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

            // 2. 최상단 이동 (중첩 리스너 분리 완료)
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