<?php 
include('phpgate.php');



// Retrieve input variables securely
$id = $_POST['id'] ?? '';
$date = $_POST['inputdate'] ?? '';
$question = $_POST['question'] ?? '';
$answer = $_POST['answer'] ?? '';
$tip = $_POST['tip'] ?? '';

// Prepared statement to avoid SQL injection
$stmt = $conn->prepare("UPDATE knowhow SET inputdate = ?, question = ?, answer = ?, tip = ? WHERE id = ?");
if ($stmt === false) {
    echo 'Statement preparation failed: ' . mysqli_error($conn);
    exit;
}

// Bind parameters
$stmt->bind_param("sssss", $date, $question, $answer, $tip, $id);

// Execute the query
$result = $stmt->execute();

// Debugging and feedback
if ($result === false) {
    echo '수정하지 못했습니다: ' . $stmt->error;
    error_log($stmt->error); // Log specific error
} else {
    echo '수정성공';
    echo "<a href='index.php'>따릉이 창 돌아가기</a>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>