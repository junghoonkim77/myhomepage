<?php 
include('connect.php');
$year = date("Y");
$month = date("m");
$day = date("d");
$today = $year.$month.$day;

$teamname = $_POST['teamname'] ?? ''; 
$internet = $_POST['internet'] ?? ''; // 기본값 설정
$tv = $_POST['tv'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$success = $_POST['success'] ?? '';
$sr = $_POST['sr'] ?? '';

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>일실적관리</title>
</head>
<body>
<div class="view">
        <table>
            <thead class="thead">
                <td>접수순서</td>
                <td>번호</td>
                <td>고객명</td>
                <td>가설일자</td>
                <td>설치예정일자</td>
                <td>컨설명</td>
                <td>상품명</td>
                <td>고객특이사항_메모</td>
                <td>삭제</td>
                <td>성공</td>
                
            </thead>
            <tbody id="sales_data">
    <?php 
      
    $ordernum = $_POST['ordernum'] ?? ''; 
    $inum = $_POST['inum'] ?? ''; // 기본값 설정
    $cusname = $_POST['cusname'] ?? '';
    $comdate = $_POST['comdate'] ?? '';
    $hopedate = $_POST['hopedate'] ?? '';
    $teamname = $_POST['teamname'] ?? '';
    $prodname = $_POST['prodname'] ?? '';
    $spememo = $_POST['spememo'] ?? ''; 

       
    if (!empty($inum) && !empty($cusname) && !empty($comdate) && !empty($hopedate) &&
    !empty($teamname) && !empty($prodname) && !empty($spememo)) {

    $sql1 = "INSERT INTO sales_board (inum, cusname, comdate, hopedate, teamname, prodname, spememo) 
            VALUES ('$inum', '$cusname', '$comdate', '$hopedate', '$teamname', '$prodname', '$spememo')";
            mysqli_query($conn, $sql1);
    } 


   $sql = "SELECT * FROM sales_board";
      $result = mysqli_query($conn,$sql);
      $row_count = mysqli_num_rows($result);
      $td = '';
      while($row = mysqli_fetch_array($result)){ 
        $td = $td."<tr><td>".$row['ordernum'].'</td>'.'<td>'.$row['inum'].'</td>'.
        '<td>'.$row['cusname'].'</td>'.'<td>'.$row['comdate'].'</td>'.'<td>'.$row['hopedate'].'</td>'.
        '<td>'.$row['teamname'].'</td>'.'<td>'.$row['prodname'].'</td>'.'<td>'.$row['spememo'].'</td>'.
        '<td>'.'<form action='.'세일즈실적관리.php'." ".'method='.'post'.'>'.
        '<input class="delsubmit" type=submit'." ".'name='.'delkey'." ".'value='.$row['ordernum'].''.'>'.'</form>'.
        '</td>'.'<td>'.'<a class="success" href="'.'세일즈누적.php?cusnum='.$row['inum'].'&'.'cusname='.$row['cusname']
        .'&'.'teamname='.$row['teamname'].'&'.'hopedate='.$row['hopedate'].'&'.'prodname='.$row['prodname'].'"'.'>'.'예정'.'</a>';
     }
     echo $td;
     
     
    ?> 
       </tbody>
        </table>  
</body>
</html>