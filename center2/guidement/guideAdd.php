<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>권유 멘트 관리</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>가이드라인 추가 및 관리</h3>
        <a href="index.php" class="btn btn-outline-secondary">← 메인 페이지로 돌아가기</a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">새 멘트 추가</div>
        <div class="card-body">
            <form id="guideAddok" action="guideAddok.php" method="post">
                <div class="mb-3">
                    <label class="form-label">구분 (카테고리)</label>
                    <select id="casessort" name="casessort" class="form-select">
                        <option value="">멘트를 추가할 메뉴를 선택하세요</option>
                        <option value="vocments">문의별 멘트</option>
                        <option value="cusments">보유상품별 멘트</option>
                        <option value="banron">반론극복</option>
                        <option value="tip">TIP (단선방지, 호전환)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">사례 (제목)</label>
                    <textarea name="cases" class="form-control" rows="2" placeholder="사례명을 입력하세요"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">내용 (가이드라인)</label>
                    <textarea name="content" class="form-control" rows="6" placeholder="상세 가이드라인 내용을 입력하세요"></textarea>
                </div>
                <button id="addbutton" type="submit" class="btn btn-primary w-100">저장하기</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-danger">
        <div class="card-header bg-danger text-white">데이터 삭제</div>
        <div class="card-body">
            <form id="delete" action="delete.php" method="post" class="row g-3">
                <div class="col-auto">
                    <input type="number" name="delnum" class="form-control" placeholder="삭제할 ID 번호 입력" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-danger">삭제 실행</button>
                </div>
                <div class="form-text text-muted">ID 번호를 정확히 확인 후 삭제하십시오.</div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#addbutton').click(function(e){
        if($('#casessort').val() === ""){
            alert('멘트를 추가할 메뉴를 먼저 선택해주세요!');
            e.preventDefault();
        }
    });

    $('#delete').submit(function(){
        return confirm("정말 삭제하시겠습니까? 이 작업은 되돌릴 수 없습니다.");
    });
</script>

</body>
</html>