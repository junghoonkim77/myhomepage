<?php 
//session은 해당 php파일의 가장 최상단에 위치해 있어야 한다.
session_start();



$title =  'login';
include('config.php'); // config.php를 include해야 밑에 functions.php실행이 된다.
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
  $password =$_POST('password');
  if($email == false){
    $status ='이메일 형식에 맞게 입력해 주세요~!';
  }

  if(authenticate_user($email,$password)){  //authenticate함수에 인자를 받아서실행후 true라면 할일
        
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