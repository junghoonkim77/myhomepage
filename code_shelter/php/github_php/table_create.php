<?php
include('connection.php');

$TableBuild =
 "CREATE TABLE `githubtest` (
    `num` INT NOT NULL AUTO_INCREMENT,
    `name1` VARCHAR(20) NOT NULL,
    `hobby` VARCHAR(30) NOT NULL,
    PRIMARY KEY (`num`)
  );" ;
  
$result =  mysqli_query($conn,$TableBuild);
?>
