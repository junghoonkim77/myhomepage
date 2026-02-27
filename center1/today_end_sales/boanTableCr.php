<?php 
include ('phpgate.php');

$sql ="CREATE TABLE dailyboan2 (
    teamname VARCHAR(100) PRIMARY KEY,
    boanresult LONGTEXT,
    inputday VARCHAR(40)
)";

$result =  mysqli_query($conn,$sql);
?>