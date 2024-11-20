<?php 
include('phpgate.php');

$sql = "SELECT * FROM mymemosave";

$result = mysqli_query($conn,$sql);

$li ='';

while($row=mysqli_fetch_array($result)){
    $li=$li.'<li>'.$row['id'].' :'.$row['memocon'].'</li>';
};

?>