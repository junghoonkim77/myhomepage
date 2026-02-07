<?php
include('phpgate.php'); // DB 연결

$team = $_POST['team'];

$sql = "SELECT pname FROM consultant WHERE teamname = '$team'";
$result = mysqli_query($conn, $sql);

echo "<option value=''>컨설턴트 선택</option>";

while($row = mysqli_fetch_assoc($result)){
    echo "<option value='".$row['pname']."'>".$row['pname']."</option>";
}
?>