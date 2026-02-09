<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script> 
    <title>실적입력창</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --bg-color: #f4f7f6;
            --card-bg: #ffffff;
            --text-color: #333;
            --border-color: #ddd;
        }

        body {
            font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, Roboto, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 10px;
        }

        .nav-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            color: #666;
            text-decoration: none;
            font-size: 0.9em;
        }

        .nav-link:hover { text-decoration: underline; }

        form {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        fieldset {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            padding: 0 10px;
            color: var(--primary-color);
        }

        .input-group {
            margin-bottom: 15px;
        }

        input[type="date"],
        input[type="number"],
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-sizing: border-box; /* 패딩 포함 크기 조절 */
            font-size: 14px;
        }

        /* 인라인 입력을 위한 스타일 */
        .inline-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        .inline-inputs input { width: 60px; }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #357abd;
        }

        .secondary-forms {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .secondary-forms { grid-template-columns: 1fr; }
        }

        .del-btn { background-color: #e74c3c; }
        .del-btn:hover { background-color: #c0392b; }
        
        .add-btn { background-color: #2ecc71; }
        .add-btn:hover { background-color: #27ae60; }
    </style>
</head>
<body>

<div class="container">
    <h2>개인 실적 입력</h2>
    <a href="index.php" class="nav-link">◀ 일별 효율 관리부 이동</a>

    <form action="siljukinsert.php" method="POST">
        <fieldset>
            <legend>기본 정보</legend>
            <label>날짜</label>
            <input type="date" name="inputday" required>
            
            <label>소속 팀</label>
            <select name="nowteam" id="teamName">
                <option value="무1">무선1</option>
                <option value="무2">무선2</option>
                <option value="무3">무선3</option>
                <option value="무4">무선4</option>
                <option value="무5">무선5</option>
            </select>

            <label>컨설턴트명</label>
            <select name="cunsulname" id="consultantName">
                <option value=''>컨설턴트 선택</option>
            </select>
        </fieldset>
        
        <fieldset>
            <legend>콜 실적</legend>
            <label>콜 건수</label>
            <input type="number" name="cpd" value="0">
            <div class="inline-inputs">
                <div>ATT <input type="text" name="att" placeholder="00:00:00"></div>
                <div>ACW <input type="text" name="acw" placeholder="00:00:00"></div>
                <div>작업시간 <input type="text" name="calltime" placeholder="00:00:00"></div>
            </div>
        </fieldset>

        <fieldset>
            <legend>인터넷/모바일 실적</legend>
            <div class="inline-inputs" style="margin-bottom:15px;">
                <strong>인터넷</strong>
                시도 <input type="number" name="trycount" value="0"> 
                성공 <input type="number" name="trysuccess" value="0"> 
                가설 <input type="number" name="trygood" value="0">
            </div>
            <div class="inline-inputs">
                <strong>모바일</strong>
                시도 <input type="number" name="mtrycount" value="0"> 
                성공 <input type="number" name="mtrysuccess" value="0"> 
                가설 <input type="number" name="mtrygood" value="0">
            </div>
        </fieldset>

        <label>자가 분석</label>
        <textarea name="analysys" placeholder="오늘의 실적을 분석해주세요..."></textarea>
        
        <button type="submit" style="margin-top:15px;">실적 저장하기</button>
    </form>

    <div class="secondary-forms">
        <form action="Nameinput.php" method="post">
            <legend style="font-size: 0.9em; font-weight: bold; margin-bottom: 10px;">컨설턴트 추가</legend>
            <select name="teamname" id="teamname_add">
                <option value="무1">무선1</option>
                <option value="무2">무선2</option>
                <option value="무3">무선3</option>
                <option value="무4">무선4</option>
                <option value="무5">무선5</option>
            </select>
            <input type="text" name="pname" id="name" placeholder="이름 입력">
            <button type="submit" class="add-btn">추가</button>
        </form>

        <form action="siljukdel.php" method="post">
            <legend style="font-size: 0.9em; font-weight: bold; margin-bottom: 10px;">실적 삭제</legend>
            <input type="number" name="delkey" placeholder="삭제할 번호 입력">
            <button type="submit" class="del-btn">삭제</button>
        </form>
    </div>
</div>

<script>
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
</script>
</body>
</html>