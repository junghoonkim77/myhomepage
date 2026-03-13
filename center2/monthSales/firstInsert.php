<?php 
include ('phpgate.php');

$sql ="INSERT INTO c2sales_month (teamname) VALUES
('무1'),
('무2'),
('무3'),
('무4'),
('무5'),
('통품'),
('유1'),
('유2')
";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "쿼리 오류: " . mysqli_error($conn);
} else {
    echo "데이터 입력 성공!";
}
?>