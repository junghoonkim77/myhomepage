<?php
include('phpgate.php');

$TableBuild =
 "CREATE TABLE `blood_record` (
    `num` INT NOT NULL AUTO_INCREMENT,
    `todaycheck` VARCHAR(25) NOT NULL,
    `hipressure` INT NOT NULL,    
    `lowpressure` INT NOT NULL,
    `memo` VARCHAR(25),
     PRIMARY KEY (`num`)
  );" ;
  
$result =  mysqli_query($conn,$TableBuild);
?>
