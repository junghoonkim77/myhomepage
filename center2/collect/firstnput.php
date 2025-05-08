<?php 
include ('phpgate.php');

$sql ="INSERT INTO cs2collect (teamname) VALUES
('무1'),
('무2'),
('무3'),
('무4'),
('무5'),
('통품');
";
$result = mysqli_query($conn,$sql);
?>