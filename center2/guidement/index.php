<?php 
include ('phpgate.php');

$sql ="SELECT * FROM guidement ORDER BY id ASC";
$result = mysqli_query($conn,$sql);
$addtable="";
while($row = mysqli_fetch_array($result)){
    $addtable .= "<tr class='".$row['casessort']."'>
        <td style='width: 20%; font-weight:bold; color:#444; vertical-align:middle;'>
            <span class='badge bg-secondary'>ID: ".$row['id']."</span><br>".nl2br($row['cases'])."
        </td>
        <td style='vertical-align:middle;'>".nl2br($row['content'])."</td>
    </tr>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <style>
        body { padding: 20px; background-color: #f8f9fa; }
        .tab-content { background: white; padding: 20px; border: 1px solid #dee2e6; border-top: none; }
        .table { background: white; }
        th { background-color: #0d6efd !important; color: white !important; }
        .btn-add { position: fixed; top: 20px; right: 20px; z-index: 1000; }
        .nav-link { cursor: pointer; }
    </style>
</head>
<body>

<button class="btn btn-primary btn-add" onclick="checkPassword()">+ 내용 추가하기</button>

<div class="container">
    <h3 class="mb-4">세일즈 멘트 가이드</h3>
    
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item"><a class="nav-link active" data-class="vocments">문의별 멘트</a></li>
        <li class="nav-item"><a class="nav-link" data-class="cusments">보유 상품별 멘트</a></li>
        <li class="nav-item"><a class="nav-link" data-class="banron">반론극복</a></li>
        <li class="nav-item"><a class="nav-link" data-class="tip">TIP 활용</a></li>
    </ul>

    <div class="tab-content">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr><th style="width:20%">구분</th><th>Guide-line 멘트</th></tr>
            </thead>
            <tbody>
                <?php echo $addtable; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // 비밀번호 체크 함수
    function checkPassword() {
        var password = prompt("관리자 비밀번호를 입력하세요:");
        if (password === "016114") {
            location.href = "guideAdd.php";
        } else if (password !== null) {
            alert("비밀번호가 일치하지 않습니다.");
        }
    }

    // 탭 필터링 로직
    $('.nav-link').click(function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        var cls = $(this).attr('data-class');
        
        if(cls === 'all') {
            $('tbody tr').show();
        } else {
            $('tbody tr').hide();
            $('.' + cls).show();
        }
    });
</script>
</body>
</html>