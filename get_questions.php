<?php
include("config.php");

$type = $_GET['type'] ?? '';

if ($type) {
    $stmt = $conn->prepare("SELECT * FROM questions WHERE quiz_type = ?");
    $stmt->bind_param("s", $type);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<p>' . $row['question_text'] . '</p>';
        echo '<input class="Answer" type="text" name="answers[' . $row['question_id'] . ']">';
        echo '</div><br>';
    }

    $stmt->close();
}
$conn->close();
?>
