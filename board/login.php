<?php 
$title =  'login';
include ('header.php');
require_once('functions.php');

/*
if($_SERVER['REQUEST_METHOD'] == "POST"){ //$_SERVER 는 현재 파일의 주소등을 보여줄수도 있다.
    //echo $_POST['email'];
    output($_POST);
} */

if(isset($_POST['login'])){
    output($_POST);
}
?> 
<form action="" method="post">
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </p>

    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <input type="submit" name="login" value="Login">
    </p>
</form>


<?php 
include('footer.php');

?>