<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 화면 확대 방지를 위해 user-scalable=no 추가 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.6.4.js" 
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" 
        integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="../java/library.js"></script>
    <style>
        * {
            box-sizing: border-box;
            font-size: 16px; /* 워치에서 시인성을 높이기 위해 기본 폰트 크기 상향 */
        }
        
        body {
            /* 워치 OLED 디스플레이 배터리 절약 및 눈부심 방지를 위한 다크모드 */
            background-color: #000000;
            color: #ffffff;
            margin: 0;
            padding: 30px 15px; /* 원형 화면의 위아래 곡선 부분에서 짤림 방지 */
            font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', Arial, sans-serif;
            text-align: center; /* 원형 화면에 맞춘 중앙 정렬 */
        }

        h2 {
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 25px;
            color: #4CAF50; /* 포인트 컬러 유지 */
        }

        /* 좁은 화면에서 손가락으로 터치하기 쉽도록 요소 크기 극대화 */
        input[type="number"], select {
            display: block;
            width: 100%;
            padding: 16px;
            margin-bottom: 15px;
            border: 2px solid #333333;
            border-radius: 20px; /* 둥근 워치 디자인과 어울리는 곡률 */
            background-color: #1a1a1a;
            color: #ffffff;
            font-size: 18px;
            text-align: center; /* 입력 숫자가 중앙에 오도록 배치 */
            appearance: none;
            -webkit-appearance: none;
        }

        input[type="number"]::placeholder {
            color: #888888;
        }

        /* 워치 화면에서 명확하게 보이도록 셀렉트 박스 화살표 커스텀 */
        select {
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: right 15px top 50%;
            background-size: 12px auto;
        }

        /* 저장 버튼을 화면에 꽉 차는 원통형으로 변경 */
        .button1 {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 18px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 25px;
        }

        .button1:active {
            background-color: #388E3C;
        }

        .container {
            display: block;
            width: 100%;
            margin: auto;
        }

        /* 하단 이동 링크를 터치하기 편한 버튼 형태로 변경 */
        a {
            display: inline-block;
            background-color: #333333;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 30px; /* 스크롤 최하단 여백 */
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
                <select name="memo" title="메모">
                    <option value="">메모 선택</option>
                    <option value="전날술집">전날술집</option>
                    <option value="전날술X집">전날술X집</option>
                    <option value="전날술사무실">전날술사무실</option>
                    <option value="전날술X사무실">전날술X사무실</option>
                    <option value="술안먹2일집">술안먹2일집</option>
                    <option value="술안먹2일사무실">술안먹2일사무실</option>
                    <option value="술안먹3일집">술안먹3일집</option>
                    <option value="술안먹3일사무실">술안먹3일사무실</option>
                    <option value="술안먹3일이상">술안먹3일이상</option>
                </select>
                <input class="button1" type="submit" value="저장">
            </form>    
        </div>
    </div>
    <a href="bp_con.php">혈압기록창 이동</a>
</body>
</html>

