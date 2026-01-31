<?php
echo '<link rel="stylesheet" href="css/Sign_up_Process.css">';
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST['userType'];

    if ($userType == 'Individual') {
        $individualName = $_POST['individualName'];
        // Insert into individuals table
        $stmt = $conn->prepare("INSERT INTO individuals (name, score) VALUES (?, 0)");
        if ($stmt === false) {
            die("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("s", $individualName);
        if (!$stmt->execute()) {
            die("Failed to execute statement: " . $stmt->error);
        }
        $member_id = $stmt->insert_id;
        $stmt->close();
        header("Location: Quizes.php?type=individual&member_id=$member_id");
        exit;
    } elseif ($userType == 'Team') {
        $teamName = $_POST['teamName'];
        $members = $_POST['members'];
        // Insert into teams table
        $stmt = $conn->prepare("INSERT INTO teams (team_name, total_score) VALUES (?, 0)");
        if ($stmt === false) {
            die("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("s", $teamName);
        if (!$stmt->execute()) {
            die("Failed to execute statement: " . $stmt->error);
        }
        $team_id = $stmt->insert_id;
        $stmt->close();
        // Insert team members
        foreach ($members as $memberName) {
            $stmt = $conn->prepare("INSERT INTO team_members (team_id, member_name, score) VALUES (?, ?, 0)");
            if ($stmt === false) {
                die("Failed to prepare statement: " . $conn->error);
            }
            $stmt->bind_param("is", $team_id, $memberName);
            if (!$stmt->execute()) {
                die("Failed to execute statement: " . $stmt->error);
            }
        }
        $stmt->close();
        header("Location: Quizes.php?type=team&team_id=$team_id");
        exit;
    } else {
        die("Invalid user type.");
    }
}

$conn->close();
?>
