<?php 
session_start();

$_SESSION['id'] ='folkball';
$_SESSION['password'] = '1234';
$url = 'testhome.html';
if(!isset($_POST['id']) || !isset($_POST['password']) ){
 echo "아이디 비번을 입력하세요~!";
}else {
 if($_POST['id']==$_SESSION['id'] && $_POST['password']==$_SESSION['password']){
    header("location:$url");
    die();
 }
}


?>