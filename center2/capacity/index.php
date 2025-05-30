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

<style>

    h3 {text-align:center;}
    
    #choice form{display:inline-block;}
    #choice {
        text-align: center;
        
    }
</style>


    <title>일별 효율 관리부</title>

</head>

<body>

    <h3>일별 효율 관리부</h3>

    <div id="choice">
    <form action="index.php" method="post">
    <select id="teamname" name="teamname">

        <option value="">팀 선택</option>

        <option value="tmu1">무선일반1팀</option>

        <option value="tmu2">무선일반2팀</option>

        <option value="tmu3">무선일반3팀</option>

        <option value="tmu4">무선일반4팀</option>

        <option value="tmu5">무선일반5팀</option>

    </select>

    <select id="cunsulname" name="cunsulname">

        <option value="">팀원명 선택</option>

        <option value="tmu1">홍길동</option>

        <option value="tmu2">무선일반2팀</option>

        <option value="tmu3">무선일반3팀</option>

        <option value="tmu4">무선일반4팀</option>

        <option value="tmu5">무선일반5팀</option>

    </select>
    <button type="submit">조회</button>
</form>
    </div>

    

</body>

</html>