<?php
include('connect.php');

$TableBuild =
 "CREATE TABLE `sales_today` (
    `num` INT NOT NULL AUTO_INCREMENT,
    `teamname` VARCHAR(20) NOT NULL,
    `sr` VARCHAR(30) NOT NULL,
    `internet` INT NOT NULL,
    `tv` INT NOT NULL,
    `mobile` INT NOT NULL,
    `success` INT NOT NULL,
    PRIMARY KEY (`num`)
  );" ;
  
$result =  mysqli_query($conn,$TableBuild);
?>
