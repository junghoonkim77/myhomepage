<?php
include('phpgate.php');

$search_team = isset($_POST['search_team']) ? mysqli_real_escape_string($conn, $_POST['search_team']) : '';
$search_name = isset($_POST['search_name']) ? mysqli_real_escape_string($conn, $_POST['search_name']) : '';
$search_month = isset($_POST['search_month']) ? mysqli_real_escape_string($conn, $_POST['search_month']) : '';

$rows = [];
if ($search_team && $search_name) {
    $sql = "SELECT * FROM team_performance 
            WHERE nowteam = '$search_team' 
            AND cunsulname = '$search_name'";

    if ($search_month != "") {
        $sql .= " AND MONTH(inputday) = '$search_month'";
    }

    $sql .= " ORDER BY inputday DESC";
    
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>효율관리부</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> 
    
    <style>
        /* 기본 스타일 초기화 */
        * { box-sizing: border-box; font-family: 'Pretendard', 'Malgun Gothic', sans-serif; }
        body { background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        h3 { text-align: center; color: #2c3e50; margin-bottom: 25px; font-size: 1.8rem; }

        /* 컨테이너 및 폼 스타일 */
        .container { max-width: 1300px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .search-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        .nav-link { text-decoration: none; color: #fff; background: #3498db; padding: 8px 16px; border-radius: 6px; font-size: 0.9rem; transition: 0.3s; }
        .nav-link:hover { background: #2980b9; }

        /* 셀렉트 박스 및 버튼 스타일 */
        select, input[type="submit"] { padding: 8px 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; transition: 0.2s; }
        select:focus { border-color: #3498db; }
        input[type="submit"] { background: #2c3e50; color: white; cursor: pointer; border: none; padding: 8px 25px; }
        input[type="submit"]:hover { background: #1a252f; }

        /* 테이블 스타일 현대화 */
        .main-table { width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden; font-size: 13px; }
        .main-table thead tr:first-child td { background: #f1f3f5; border-bottom: 2px solid #dee2e6; }
        .main-table th, .main-table td { border: 1px solid #e9ecef; padding: 12px 8px; text-align: center; }

        /* 그룹 헤더 색상 정의 */
        .header-prod { background-color: #e7f5ff !important; color: #0056b3; font-weight: bold; } /* 생산성 */
        .header-it { background-color: #fff9db !important; color: #856404; font-weight: bold; }   /* IT */
        .header-mob { background-color: #fff0f6 !important; color: #a61e4d; font-weight: bold; }  /* M가입 */
        .header-analysis { background-color: #f3f0ff !important; color: #5f3dc4; font-weight: bold; }

        /* 마우스 호버 효과 */
        tbody tr:hover { background-color: #f8f9fa; }
        
        /* 데이터 스타일 */
        .inputday { font-weight: bold; border-radius: 4px; }
        .try-rate { color: #d941c1; font-weight: 800; }
        .analysis-text { text-align: left !important; min-width: 200px; color: #555; font-size: 12px; }
        .empty-row { padding: 40px !important; color: #999; font-size: 1.1rem; }

        /* 레드데이 강조 클래스 (JS에서 활용) */
        .is-red-day { background-color: #ff5252 !important; color: white !important; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h3>일별 효율 관리부</h3>

    <form id="cunsulchoice" method="post" action="index.php" class="search-bar">
        <div>
            <a href="inputgate.php" class="nav-link">실적입력창 이동</a>
        </div>
        <div style="display: flex; gap: 8px;">
            <select id="teamName" name="search_team">
                <option value=''>팀 선택</option>
            </select>
            <select id="consultantName" name="search_name">
                <option value=''>컨설턴트 선택</option>
            </select>
            <select name="search_month">
                <option value="">전체 월</option>
                <?php
                for ($m = 1; $m <= 12; $m++) {
                    $selected = ($search_month == $m) ? 'selected' : '';
                    echo "<option value='$m' $selected>{$m}월</option>";
                }
                ?>
            </select>
            <input type="submit" value="조회하기">
        </div>
    </form>

    <table class="main-table">
        <thead>
            <tr>
                <td rowspan="2" style="background:#343a40; color:#fff; width: 100px;">날짜</td>
                <td colspan="4" class="header-prod">생산성 지표</td>
                <td colspan="4" class="header-it">IT 가입기회발굴</td>
                <td colspan="4" class="header-mob">M 가입기회발굴</td>
                <td class="header-analysis">분석</td>
            </tr>
            <tr>
                <th class="header-prod">CPD</th>
                <th class="header-prod">ATT</th>
                <th class="header-prod">ACW</th>
                <th class="header-prod">작업시간</th>
                <th class="header-it">시도</th>
                <th class="header-it">시도율</th>
                <th class="header-it">이관</th>
                <th class="header-it">가설</th>
                <th class="header-mob">시도</th>
                <th class="header-mob">시도율</th>
                <th class="header-mob">이관</th>
                <th class="header-mob">가설</th>
                <th class="header-analysis">상세내용 [차수]</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $data): ?>
                <tr>
                    <td class="inputday"><?php echo $data['inputday']; ?></td>
                    <td><?php echo number_format($data['cpd']); ?></td>
                    <td><?php echo $data['att']; ?></td>
                    <td><?php echo $data['acw']; ?></td>
                    <td><?php echo $data['calltime']; ?></td>
                    
                    <td><?php echo $data['trycount']; ?></td>
                    <td class="try-rate"><?php echo $data['tryrate']; ?>%</td>
                    <td><?php echo $data['trysuccess']; ?></td>
                    <td><?php echo $data['trygood']; ?></td>
                    
                    <td><?php echo $data['mtrycount']; ?></td>
                    <td class="try-rate"><?php echo $data['mtryrate']; ?>%</td>
                    <td><?php echo $data['mtrysuccess']; ?></td>
                    <td><?php echo $data['mtrygood']; ?></td>
                    
                    <td class="analysis-text">
                        <?php echo nl2br(htmlspecialchars($data['analysys'])); ?>
                        <span style="color:#bbb; margin-left:5px;">[<?php echo $data['inputorder']; ?>]</span>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="14" class="empty-row">데이터를 조회하려면 팀과 이름을 선택 후 확인을 눌러주세요.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    // 기존 기능 로직 유지
    const teamName = {무1:'무선1팀', 무2:'무선2팀', 무3:'무선3팀', 무4:'무선4팀', 무5:'무선5팀'};

    for (let key in teamName){
        $('#teamName').append(`<option value="${key}">${teamName[key]}</option>`)
    }

    $('#teamName').change(function(){
        let team = $(this).val();
        $.ajax({
            url: "getConsultant.php",
            type: "POST",
            data: { team: team },
            success: function(response){
                $('#consultantName').html(response);
            }
        });
    });

    // 레드데이 강조 (JS에서 클래스 부여 방식으로 수정하여 CSS 제어)
    const red = ['2026-02-02','2026-02-09','2026-02-10','2026-02-19','2026-02-20','2026-02-23'];

    $('.inputday').each(function(){
        let dateText = $(this).text().trim();
        if (red.includes(dateText)){
            $(this).addClass('is-red-day');
        }
    });
</script>

</body>
</html>