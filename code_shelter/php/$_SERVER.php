<?php

//print_r($_SERVER);

echo $_SERVER['PHP_SELF'];

$ag = $_SERVER['HTTP_USER_AGENT'];
if(strpos($ag,'Chrome')){
    echo "크롬유저시군요";
}else{
    echo "크롬이 아니군요?";
}

?>

<script>
    const ag = JSON.parse('<?php echo json_encode($ag); ?>')
    console.log(ag);
</script>
<a href="<?= $_SERVER['PHP_SELF']; ?>?a=b">b 값을 가져오기 </a>
