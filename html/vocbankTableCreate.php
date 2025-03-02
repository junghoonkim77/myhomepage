<?php
include('phpgate.php');

$TableBuild =
 "CREATE TABLE `vocbank` (
    `num` INT NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(500) NOT NULL,
    `title` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`num`)
  );" ;
  
$result =  mysqli_query($conn,$TableBuild);
?>