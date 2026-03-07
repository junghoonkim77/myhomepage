<div id="destroy">
    <!-- 인증 결과에 따라 여기에 내용이 삽입됩니다 -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
</div>

<script>
    $(document).ready(function() {
        // 1. 페이지 로드 즉시 prompt 띄우기
        let password = prompt("비밀번호를 입력하세요:");

        if (password) {
            // 2. jQuery AJAX로 서버에 비번 전송
            $.ajax({
                url: 'check_auth.php', // 인증을 처리할 PHP 파일
                type: 'POST',
                data: { pw: password },
                success: function(response) {
                    // 3. 서버에서 보내준 HTML(include 결과)을 화면에 삽입
                    $('body').html(response);
                    $('#destroy').empty();
                },
                error: function() {
                    alert("서버 통신 오류가 발생했습니다.");
                }
            });
        } else {
            $('body').html("<p>비밀번호를 입력해야 내용을 볼 수 있습니다.</p>");
        }
    });
    </script>
<!DOCTYPE html5>
<html lang="ko">
    <head>
     <meta charset="utf-8">
        <link rel="stylesheet"  href="../css/buttontest1.css">
        <link rel="stylesheet" href="../css/gate.css">

     <script src="https://code.jquery.com/jquery-3.6.1.js" 
     integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>  
     <title>통품홈</title>
      </head>
        <body> 

        </body>
       <script src="../java/library.js">  </script>
    <script src="../java/voc_bank.js">  </script>
</html>