<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" 
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" 
        integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="../java/library.js"></script>
    <style>
        * {
            font-size: 14px; /* 모바일에서 조금 더 크게 */
            box-sizing: border-box;
        }
        
        body {
            margin: 10px;
            font-family: Arial, sans-serif;
        }

        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 16px; /* 입력창 간격 */
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .button1 {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 14px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .button1:hover {
            background-color: #45a049;
        }

        .container {
            display: block; /* 모바일에서는 단일 컬럼으로 */
            max-width: 400px;
            margin: auto;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }
    </style>
    <title>★혈압기록★</title>
</head>
<body>
    <h2>혈압입력창</h2>
    <div class="container">
        <div class="control">
            <form action="bp_insert.php" method="post">
                <input id="nowtime" type="hidden" value="<?php echo date('y년 n월 d일H:i:s');?>" name="nowtime">
                <input title="수축기혈압" placeholder="수축기혈압" type="number" name="hipressure">
                <input title="이완기혈압" placeholder="이완기혈압" type="number" name="lowpressure">
                <input title="메모" placeholder="메모" type="text" name="memo">
                <input class="button1" type="submit" value="저장">
            </form>    
        </div>
    </div>
    <a href="bp_con.php">혈압기록창 이동</a>
</body>
</html>
