<?php 
session_start();
session_unset();
session_destroy();

echo "
<script>
alert('로그 아웃 됐습니다.');
self.location.href='index.php';
</script>
"
?>