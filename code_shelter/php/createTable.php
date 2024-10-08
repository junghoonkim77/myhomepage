<?php 
include('connect.php');

$table_build =
"CREATE TABLE `table_practice` (
`num` INT NOT NULL AUTO_INCREMENT,
`full_name` VARCHAR(20) NOT NULL,
`hobby` VARCHAR(40) NOT NULL,
PRIMARY KEY(`num`)
);" ;

$result = mysqli_query($conn, $table_build);

?>