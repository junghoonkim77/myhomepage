<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">

    </script>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">

    </script> 


    <title>시간별 실적</title>

</head>

<body>

    <h5>시간별 실적 입력</h5>

    <fieldset>

        <legend>실적입력창</legend>

        <form id="timecapa" method="post" action="insert.php">

            
            <input type="number" placeholder="현시간 누적" id="nowCpdcount" name="nowCpdcount">

            <input type="number" placeholder="세일즈 시도건수" id="nowSalestry" name="nowSalestry">

            <input type="number" placeholder="세일즈 이관성공" id="nowSalesSuccess" name="nowSalesSuccess">

            <input type="hidden" value ="" id="nowtime" name="nowtime">

            <input type="hidden" value ="" id="classtime" name="classtime">

            <button id="submitbut">실적제출</button>

            </form>

    </fieldset>

    

    

    <script>

        function timefresh (){

            const today = new Date();
     const dayyear = today.getFullYear();
     const daymonth = today.getMonth()+1; 
     const daytoday = String(today.getDate()).padStart(2, '0');
     const classday = String(`${dayyear}-${daymonth}-${daytoday}`);
     const daynow = today.toLocaleTimeString();

     const inputttime = `${classday}:${daynow}`

     $('#nowtime').val(inputttime);
     $('#classtime').val(classday);

        }

     

      setInterval(timefresh,5000);

         

     $('#submitbut').on('click',function(e){

        e.preventDefault();

        if($('#nowCpdcount').val()=="" && $('#nowSalestry').val()=="" && 

        $('#nowSalesSuccess').val()=="" ){

            alert('빈 항목에 값을 입력하세요');

        }else{
           $('#timecapa').submit(); 

            

        }

     })

    </script>

</body>

</html>