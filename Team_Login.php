<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Team_Login.css">
    <title>Search by team</title>
</head>
<body>
     <!-- Form for searching by team name or team ID -->
     <form method="POST" action="">
        <h2>Search by Team</h2>
        <label for="team_id">Team ID:</label>
        <input type="text" id="team_id" name="team_id" required><br><br>

        <label for="team_name">Team Name:</label>
        <input type="text" id="team_name" name="team_name" ><br><br>

        <input type="submit" name="search_team" value="Search Team" id="Display" class="Submit"> <br> <br>
        <hr>
  










      
<?php 

// Database connection
include("config.php");


// Handle team search
if (isset($_POST['search_team']))
{
    $team_id = $_POST['team_id'];
    $team_name = $_POST['team_name'];

    // Search by team ID or team name
    $sql = "SELECT * FROM teams WHERE team_id='$team_id' AND team_name='$team_name'";
   
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output team information
        while ($row = $result->fetch_assoc())
        {
            echo "<section>";
            echo "<div>";
            echo "<h3>Team Information</h3>";
            echo "<div>Team ID: " . $row["team_id"] . "</div>" . "<br>";
            echo "<div>Team Name: " . $row["team_name"] . "</div>". "<br>";
           
            echo "<div>Total Score: " . $row["total_score"] . "</div>". "<br><br>";
            echo "</div>";
            // Fetch and display team members
            $team_id = $row["team_id"];
            $sql_teams = "SELECT * FROM teams WHERE team_id='$team_id'";
            $sql_members = "SELECT `member_id`, `member_name`, `score` FROM `team_members` WHERE team_id='$team_id'";
            $members_result = $conn -> query($sql_members);
            $team_result = $conn->query($sql_teams);
            
            echo "<div>";
            echo "<h3>Team Members:</h3>";
            while( $member_row = $members_result->fetch_assoc())
            {
                echo "<div> Member ID: " . $member_row["member_id"] . " - Name: " . $member_row["member_name"] . " - Score: " . $member_row["score"] . "</div>". "<br>";
            }
          
            echo "</div>";
            echo "</section>";

        }   
        echo "<button class='Play' id='Home'><a href='Index.php' >Home Page</a></button>";
        
    } 
   
    else 
    {
        echo "<div style='width: 53%; margin: auto; margin-top: 60px; color: red;   margin-bottom: 50px; text-align: center;  background-color: #ffff; border-radius: 10px; height: 35px; padding-left: 20px; padding-top: 10px;'>No team found with the given ID or name.</div>";
        echo "<div style='display: flex;'>";
        echo "<button class='Play' id='Home'><a href='Index.php' >Home Page</a></button>";
        echo "<button class='Play2' id='Home'><a href='Sign_up.php' >Register And Play</a></button>";
        echo "</div>";
    }

}

echo '  <script src="js/Teams_Scores.js"></script>'; ?>

    </form>
   
</body>
</html>

