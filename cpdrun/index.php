<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" crossorigin="anonymous"></script> 

    <title>시간별 실적</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e4ec);
            margin: 0;
            padding: 30px;
        }

        h5 {
            text-align: center;
            font-size: 1.4em;
            color: #333;
            margin-bottom: 20px;
        }

        fieldset {
            border: 2px solid #4a90e2;
            border-radius: 10px;
            padding: 20px;
            background: #fff;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        legend {
            font-weight: bold;
            color: #4a90e2;
            padding: 0 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 6px rgba(74,144,226,0.3);
        }

        button {
            padding: 12px;
            background: #4a90e2;
            color: #fff;
            font-size: 1em;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: #357ab8;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <h5>시간별 실적 입력</h5>
    <fieldset>
        <legend>실적입력창</legend>
        <form id="timecapa" method="post" action="insert.php">
            <input type="number" placeholder="현시간 총 누적CPD입력" id="nowCpdcount" name="nowCpdcount">
            <input type="number" placeholder="세일즈 시도건수" id="nowSalestry" name="nowSalestry">
            <input type="number" placeholder="세일즈 이관성공" id="nowSalesSuccess" name="nowSalesSuccess">
            <input type="hidden" value="" id="nowtime" name="nowtime">
            <input type="hidden" value="" id="classtime" name="classtime">
            <button id="submitbut">실적제출</button>
        </form>
        <a href="record.php" style="display:block; text-align:center; margin-top:15px; color:#4a90e2; text-decoration:none;">실적 기록 보러가기</a>
    </fieldset>

    <script>
        function timefresh (){
            const today = new Date();
            const dayyear = today.getFullYear();
            const daymonth = today.getMonth()+1; 
            const daytoday = String(today.getDate()).padStart(2, '0');
            const classday = String(`${dayyear}-${daymonth}-${daytoday}`);
            const daynow = today.toLocaleTimeString();
            const inputttime = `${classday}:${daynow}`;
            $('#nowtime').val(inputttime);
            $('#classtime').val(classday);
        }

        setInterval(timefresh,5000);

        $('#submitbut').on('click',function(e){
            e.preventDefault();
            if($('#nowCpdcount').val()=="" && $('#nowSalestry').val()=="" && $('#nowSalesSuccess').val()==""){
                alert('빈 항목에 값을 입력하세요');
            }else{
                $('#timecapa').submit(); 
            }
        })
    </script>
</body>
</html>
