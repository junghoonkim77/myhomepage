<?php 
include ('phpgate.php');

$sql ="INSERT INTO c1sales_end (teamname) VALUES
('유1'),
('유2'),
";
$result = mysqli_query($conn,$sql);
?>