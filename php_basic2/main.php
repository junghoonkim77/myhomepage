<?php 
include('header.html');
include('functions.php');


$number =$_GET['nu'] ?? '';



if(!empty($number)){
    echo "<pre>".display($number)."</pre>";
} 


?>
<a href="main.php?nu=0">1번</a>
<a href="main.php?nu=1">2번</a>
<a href="main.php?nu=2">3번</a>
<a href="main.php?nu=3">4번</a>

<?php
include('footer.html')

?>