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
  $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL); //이메일 형식이 맞는지 필터링 하는 함수 
  if($email == false){
    $status ='이메일 형식에 맞게 입력해 주세요~!';
  }
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
<div class="error">
    <p>
        <?php 
        if(isset($status)){
            echo $status;
        }
        ?>
    </p>
</div>

<?php 
include('footer.php');

?>