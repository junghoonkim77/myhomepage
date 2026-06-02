<?php 
include('phpgate.php');
mysqli_set_charset($conn, "utf8"); // 한글 깨짐 방지

$sql ="SELECT * FROM knowhow ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$addtable = "";
while($row = mysqli_fetch_array($result)){
    $addtable .= "
    <div class='card mb-3 shadow-sm'>
        <div class='card-header d-flex justify-content-between align-items-center bg-light'>
            <span class='badge bg-dark'>ID: {$row['id']}</span>
            <small class='text-muted'>{$row['inputdate']}</small>
        </div>
        <div class='card-body'>
            <h5 class='card-title text-primary'>Q. ".nl2br($row['question'])."</h5>
            <hr>
            <p class='card-text'><strong>A.</strong> ".nl2br($row['answer'])."</p>
            <div class='alert alert-warning p-2 mt-2 mb-0'>
                <small><strong>💡 TIP:</strong> ".nl2br($row['tip'])."</small>
            </div>
        </div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>무엇이든 물어보세요! 따릉~따릉~</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body { background-color: #f4f7f6; padding: 20px; }
        .container { max-width: 800px; }
        .card-header { font-size: 0.9em; }
        .fixed-btn-container {
        position: fixed;   /* 화면에 고정 */
        bottom: 30px;      /* 아래에서 30px 띄움 */
        right: 30px;       /* 오른쪽에서 30px 띄움 */
        z-index: 1000;     /* 다른 요소들보다 위에 표시 */
    }
    
    /* 버튼 모양을 좀 더 예쁘게 다듬기 */
    .btn-floating {
        border-radius: 50px; 
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center my-4" style="font-family: 'Pacifico', cursive;">무엇이든 물어보세요! 따릉~따릉~</h2>
    
    <div id="board-list">
        <?php echo $addtable; ?>
    </div>

    <div class="fixed-btn-container">
    <button class="btn btn-dark btn-floating" onclick="secureMove()">+ 정보 추가하기</button>
    </div>
</div>

<script>
    function secureMove() {
        var password = prompt("관리자 코드를 입력하세요:");
        if (password === "016114") {
            location.href = 'input.php';
        } else if (password !== null) {
            alert("코드가 일치하지 않습니다.");
        }
    }
</script>

</body>
</html>