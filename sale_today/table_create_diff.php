<?php
include('connect.php');

$TableBuild =
 "CREATE TABLE `difference` (
    `num` INT NOT NULL AUTO_INCREMENT,
    `teamname` VARCHAR(20) NOT NULL,
    `sr` VARCHAR(30) NOT NULL,
    `srhead` VARCHAR(20) NOT NULL,
     PRIMARY KEY (`num`)
  );" ;
  
$result =  mysqli_query($conn,$TableBuild);
?>
