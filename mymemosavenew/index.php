<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메모입력창</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f5f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px 16px;
        }
        .container {
            width: 100%;
            max-width: 480px;
            background: #ffffff;
            padding: 24px 20px;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }
        h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1d1d1f;
            margin-bottom: 16px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        textarea {
            width: 100%;
            height: 180px;
            padding: 14px;
            font-size: 1rem;
            line-height: 1.5;
            color: #1d1d1f;
            background-color: #f9f9fb;
            border: 1px solid #e5e5ea;
            border-radius: 12px;
            resize: vertical;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        textarea:focus {
            border-color: #0071e3;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15);
            background-color: #ffffff;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 4px;
        }
        input[type="submit"], 
        .btn-view {
            width: 100%;
            padding: 14px 0;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }
        input[type="submit"] {
            background-color: #0071e3;
            color: #ffffff;
        }
        input[type="submit"]:active {
            background-color: #005bb5;
            transform: scale(0.98);
        }
        .btn-view {
            background-color: #e5e5ea;
            color: #1d1d1f;
        }
        .btn-view:active {
            background-color: #d1d1d6;
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>메모 작성</h1>
        <form action="memosavenew.php" method="post">
            <textarea name="texAreamemo1" id="texAreamemo1" cols="30" rows="10" placeholder="메모를 입력하세요..."></textarea>
            <div class="btn-group">
                <input type="submit" value="저장">
                <button type="button" class="btn-view" onclick="location.href='../mymemosavenew/memoview.php'">메모보기</button>
            </div>
        </form>
    </div>
</body>
</html>