<?php 
//exit()는 에러메시지 출력없이 종료하는거
//die()는 에러메시지 출력하며 종료하는거

session_start();
require_once('config.php');
require_once('functions.php');

ensure_user_is_authenticated();

echo $_SESSION['email'];
include ('header.php');

?>
<a href="logout.php">logout</a>
<?php 
include('footer.php');
?>