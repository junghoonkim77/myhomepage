<?php 
setcookie("username","김정훈",time()+24*60*60*30);
echo "쿠키설정완료!";

if(isset($_COOKIE['username'])){
 echo $_COOKIE['username'].'님 환영합니다.';
}else{
    echo 'usertname 님 쿠키가 존재하지 않습니다.';   
}


?>