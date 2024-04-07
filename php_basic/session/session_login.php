<?php 
session_start();
$_SESSION['userid'] = "folkball";
$_SESSION['username'] = "김정훈";

echo "
<script>
location.href ='session_page.php'
</script>
"

?>