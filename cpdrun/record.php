<?php
include 'phpgate.php'; // DB 연결 파일 포함

// 1. 데이터베이스에서 입력 순서대로 전체 데이터 가져오기
$sql = "SELECT * FROM performance_records ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시간당 실적</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>시간별 실적 목록</h2>
    <table>
        <thead>
            <tr>
                <th>입력시간</th>
                <th>누적 CPD</th>
                <th>시간당 CPD (계산전)</th>
                <th>세일즈 시도건수</th>
                <th>세일즈 성공건수</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 2. PHP 반복문을 통해 단순 출력
            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="cell-time"><?php echo htmlspecialchars($row['nowtime']); ?></td>
                        <td class="cell-cpd"><?php echo $row['nowCpdcount']; ?></td>
                        <td class="cell-hourly">-</td> <td class="cell-try"><?php echo $row['nowSalestry']; ?></td>
                        <td class="cell-success"><?php echo $row['nowSalesSuccess']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>데이터가 없습니다.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="index.php">입력 페이지로 이동</a>
</body>
</html>

<?php
mysqli_close($conn); // 연결 종료
?>