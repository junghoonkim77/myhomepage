<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지식 관리 시스템</title>
    <style>
        :root { --primary-color: #4a90e2; --bg-color: #f4f7f6; }
        body { font-family: 'Pretendard', sans-serif; background-color: var(--bg-color); padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        
        h2 { text-align: center; color: #333; }
        label { display: block; margin-top: 15px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 12px; margin-top: 5px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        
        button { width: 100%; padding: 12px; margin-top: 20px; background-color: var(--primary-color); color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s; }
        button:hover { background-color: #357abd; }
        
        .action-forms { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; }
        .action-forms input { width: 100%; }
        .btn-sub { background-color: #666; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div class="container">
    <a href="index.php">← 메인으로 돌아가기</a>
    <h2>지식 데이터 추가</h2>
    
    <form action="insert.php" method="post">
        <label for="inputdate">날짜</label>
        <input id="inputdate" type="date" name="inputdate">

        <label for="question">질문</label>
        <input id="question" type="text" name="question" placeholder="질문을 입력하세요">

        <label for="answer">답변</label>
        <textarea id="answer" name="answer" rows="8" placeholder="답변 내용을 작성하세요"></textarea>

        <label for="tip">Tip</label>
        <textarea id="tip" name="tip" rows="4" placeholder="참고할 팁을 작성하세요"></textarea>

        <button id="pass" type="submit">지식 추가하기</button>
    </form>

    <div class="action-forms">
        <form action="delete.php" id="delform" method="get">
            <input type="number" name="delnum" placeholder="번호 삭제">
            <button class="btn-sub" id="delcon" type="submit">삭제</button>
        </form>
        <form action="edit.php" method="get">
            <input type="number" name="editnum" placeholder="번호 수정">
            <button class="btn-sub" type="submit">수정</button>
        </form>
    </div>
</div>

<script>
    $('#pass').click(function(){
        if($('#inputdate').val() == '' || $('#question').val() == '' || $('#answer').val() == '' || $('#tip').val() == ''){
            alert('모든 항목을 입력해주세요.');
            return false;
        }
    });

    $('#delcon').click(function(e){
        if(!confirm('정말 삭제하시겠습니까?')) e.preventDefault();
    });
</script>
</body>
</html>