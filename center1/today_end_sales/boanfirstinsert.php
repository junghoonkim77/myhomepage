<?php 
include ('phpgate.php');

$sql ="INSERT INTO dailyboan2 (teamname) VALUES
('유1'),
('유2'),
";
$result = mysqli_query($conn,$sql);
?>