<?php
echo '<link rel="stylesheet" href="css/results.css">';
include("config.php");

// Get user type and score from the URL parameters
$type = $_GET['type'] ?? '';
$score = $_GET['score'] ?? '';
$member_id = $_GET['member_id'] ?? null;
$team_id = $_GET['team_id'] ?? null;

if ($type === 'individual' && $member_id) {
    // Fetch individual's details
    $result = $conn->query("SELECT * FROM individuals WHERE member_id = $member_id");
    $row = $result->fetch_assoc();
    echo "<section>";
    echo "<h2>Quiz Results</h2> <br>";
    echo "<div>Member Name: " . $row['name'] . "</div> <br>";
    echo "<div>Member ID: " . $row['member_id'] . "</div> <br>";
    echo "<div>Member Score: " . $score . "</div> <br>";
    echo "<button class='Play'><a href='Quizes.php?member_id=$member_id&type=individual'>Play Again</a></button>";
    echo "<button class='Play'><a href='Index.php'>Home Page</a></button>";
    echo "</section>";
} elseif ($type === 'team' && $team_id) {
    // Fetch team's details
    $result = $conn->query("SELECT * FROM teams WHERE team_id = $team_id");
    $team = $result->fetch_assoc();
    echo "<section>";
    echo "<h2>Quiz Results</h2> <br>";
    echo "<h3>Team</h3>";
    echo "<div>Team Name: " . $team['team_name'] . "</div> <br>";
    echo "<div>Team ID: " . $team['team_id'] . "</div> <br>";
    echo "<div>Total Score: " . $score . "</div> <br>";
    echo "<h3>Members</h3>";
    $members = $conn->query("SELECT * FROM team_members WHERE team_id = $team_id");
    while ($member = $members->fetch_assoc()) {
        echo "<div>Member: " . $member['member_name'] . " | ID: " . $member['member_id'] . " | Score: " . $member['score'] . "</div><br>";
    }
    echo "<button class='Play'><a href='Quizes.php?team_id=$team_id&type=team'>Play Again</a></button>";
    echo "<button class='Play'><a href='Index.php'>Home Page</a></button>";
    echo "</section>";
}

$conn->close();
?>
