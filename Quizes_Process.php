<?php
echo '<link rel="stylesheet" href="css/Quizes_Process.css">';
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user type and quiz type
    $type = $_POST['type'];
    $quiz_type = $_POST['Choose'];
    $member_id = $_POST['member_id'] ?? null;
    $team_id = $_POST['team_id'] ?? null;

    // Retrieve user's answers
    $user_answers = $_POST['answers'] ?? [];
    $correct_answers = 0;

    foreach ($user_answers as $question_id => $user_answer) {
        // Get the correct answer from the database
        $stmt = $conn->prepare("SELECT correct_answer FROM questions WHERE question_id = ?");
        $stmt->bind_param("i", $question_id);
        $stmt->execute();
        $stmt->bind_result($correct_answer);
        $stmt->fetch();
        $stmt->close();

        // Compare user's answer with the correct answer
        if (strtolower(trim($user_answer)) == strtolower(trim($correct_answer))) {
            $correct_answers++;
        }
    }

    $score = $correct_answers * 10; // Assuming each correct answer is worth 10 points

    if ($type === 'individual' && $member_id) {
        // Update individual's score
        $sql = "UPDATE individuals SET score = score + ? WHERE member_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $score, $member_id);
        $stmt->execute();
        $stmt->close();
        // Redirect to the score display page
        header("Location: results.php?type=individual&member_id=$member_id&score=$score");
        exit;
    } elseif ($type === 'team' && $team_id) {
        // Update team member's scores
        $sql = "UPDATE team_members SET score = score + ? WHERE team_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $score, $team_id);
        $stmt->execute();
        // Calculate the total team score
        $team_score = $conn->query("SELECT SUM(score) AS total_score FROM team_members WHERE team_id = $team_id")->fetch_assoc()['total_score'];
        $conn->query("UPDATE teams SET total_score = $team_score WHERE team_id = $team_id");
        // Redirect to the score display page
        header("Location: results.php?type=team&team_id=$team_id&score=$team_score");
        exit;
    }
}

$conn->close();
?>
