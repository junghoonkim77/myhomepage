<?php
include ('phpgate.php');
$sql = "SELECT * FROM voc_table ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>VOC 정밀 검색 시스템</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f7f8; }
        .search-box { 
            background: white; padding: 20px; border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;
            display: flex; gap: 10px;
        }
        select, input { padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        input { flex-grow: 1; }
        
        table { width: 100%; border-collapse: collapse; background: white; font-size: 13px; }
        th, td { border: 1px solid #eee; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #fcfcfc; }
        
        .col-long { white-space: pre-wrap; word-break: break-all; width: 15%; }
        #vocBody { display: none; } /* 처음엔 숨김 */
        .highlight { background-color: yellow; font-weight: bold; color: black; } /* 하이라이트 스타일 */
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

    <h2>sr 검색 서비스</h2>

    <div class="search-box">
        <select id="searchColumn">
            <option value="all">전체 컬럼</option>
            <option value="2">구분</option>
            <option value="3">1차</option>
            <option value="4">2차</option>
            <option value="7">의미(con_meaning)</option>
            <option value="8">공통(common)</option>
        </select>
        <input type="text" id="vocSearch" placeholder="검색어를 입력하세요 (띄어쓰기로 여러 단어 조합 가능: 예 '중계기 관련')">
    </div>

    <table id="vocTable">
        <thead>
            <tr>
                <th>순번</th><th>엑셀번호</th><th>구분</th><th>1차</th><th>2차</th><th>3차</th><th>4차</th>
                <th class="col-long">정의</th><th class="col-long">공통</th><th class="col-long">유선</th><th class="col-long">무선</th>
            </tr>
        </thead>
        <tbody id="vocBody">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".($row["vocno"] ?? '-')."</td>";
                    echo "<td>".($row["vocno"] ?? '-')."</td>";
                    echo "<td>".htmlspecialchars($row["vocseper"] ?? '')."</td>";
                    echo "<td>".htmlspecialchars($row["voc1cha"] ?? '')."</td>";
                    echo "<td>".htmlspecialchars($row["voc2cha"] ?? '')."</td>";
                    echo "<td>".htmlspecialchars($row["voc3cha"] ?? '')."</td>";
                    echo "<td>".htmlspecialchars($row["voc4cha"] ?? '')."</td>";
                    echo "<td class='col-long'>".htmlspecialchars($row["con_meaning"] ?? '')."</td>";
                    echo "<td class='col-long'>".htmlspecialchars($row["common"] ?? '')."</td>";
                    echo "<td class='col-long'>".htmlspecialchars($row["wire"] ?? '')."</td>";
                    echo "<td class='col-long'>".htmlspecialchars($row["wireless"] ?? '')."</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#vocSearch').on('keyup', function() {
            var value = $(this).val().toLowerCase().trim();
            var searchCol = $('#searchColumn').val();
            var $tbody = $('#vocBody');

            if (value === "") {
                $tbody.hide();
                // 검색어 삭제 시 하이라이트 제거
                $("#vocBody td").each(function() {
                    $(this).html($(this).text());
                });
                return;
            }

            $tbody.show();

            var keywords = value.split(/\s+/);

            $("#vocBody tr").each(function() {
                var $row = $(this);
                var isMatch = true;
                
                // 1. 행 전체 텍스트로 매칭 여부 먼저 확인 (AND 조건)
                var rowText = $row.text().toLowerCase();
                isMatch = keywords.every(function(kw) {
                    if (searchCol === "all") {
                        return rowText.indexOf(kw) > -1;
                    } else {
                        return $row.find('td').eq(searchCol).text().toLowerCase().indexOf(kw) > -1;
                    }
                });

                $row.toggle(isMatch);

                // 2. 매칭된 경우 하이라이트 처리
                if (isMatch) {
                    $row.find('td').each(function(idx) {
                        var $td = $(this);
                        var originalText = $td.text();
                        
                        // 하이라이트를 적용할 대상인지 확인 (전체검색이거나 선택된 컬럼인 경우)
                        if (searchCol === "all" || idx == searchCol) {
                            var highlightedText = originalText;
                            keywords.forEach(function(kw) {
                                if (kw === "") return;
                                // 대소문자 구분 없이 바꾸기 위해 정규표현식 사용
                                var regex = new RegExp("(" + kw.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ")", "gi");
                                highlightedText = highlightedText.replace(regex, '<span class="highlight">$1</span>');
                            });
                            $td.html(highlightedText);
                        } else {
                            $td.html(originalText); // 선택되지 않은 컬럼은 하이라이트 제거
                        }
                    });
                }
            });
        });

        $('#searchColumn').on('change', function() {
            $('#vocSearch').trigger('keyup');
        });
    });
    </script>

</body>
</html>