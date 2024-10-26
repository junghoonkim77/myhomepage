<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>로그인 폼</title>
</head>
<body>
    <h1>로그인</h1>
    <form action="login_ok.php" name="login_form" method="post" autocomplete="off">
        <label for="">아이디</label>
        <input type="text" name="id" id="id" placeholder="아이디 입력"></br>
        <label for="">비밀번호</label>
        <input type="password" name="pw" id="pw" placeholder="비번 입력"></br>
        <button id="login_btn">확인</button>
    </form>
    <script>
        const id = $('#id');
        const pw = $('#pw');
        const btn = $('#login_btn');
        btn.on('click',(e)=>{
            if(id.val()==""){
                e.preventDefault()
            }else{
                e.submit();
            }
            
        })
    </script>
</body>
</html>