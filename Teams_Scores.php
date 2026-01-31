<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Team_Scores.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">

    <title>All Scores</title>
</head>
<body>
       <!-- Button to display the total scores for all teams -->
       <form method="POST" action="">
        <h2>Display Total Scores</h2>
        
    <?php 

    // Database connection
      include("config.php");

// Handle showing total scores for all teams
if (isset($_POST['show_scores']))
{
    $sql = "SELECT team_name, total_score FROM teams";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        echo "<h3 >Total Scores for All Teams:</h3>";
        while ($row = $result->fetch_assoc()) 
        {
            echo "<div>Team: " . $row["team_name"] . " - Total Score: " . $row["total_score"] . "</div> <br> ";
          
        }
        
        echo "<button class='Play'><a href='Index.php' id='Home'>Home Page</a></button>";

    } 
    else
    {
   
        echo "<div  style='width: 20%; margin: auto; margin-top: 60px; color: red;  margin-bottom: 50px; text-align: center;'>No teams found.</div>";
        echo "<button class='Play' id='Home'><a href='Sign_up.php'>Register And Play</a></button>";
        echo "<button class='Play'><a href='Index.php' id='Home'>Home Page</a></button>";

    }
}


// Close connection
$conn->close();

?>

        <input type="submit" id="Display" name="show_scores" value="Show Total Scores" >
        
    </form>

    <!-- <script src="js/Teams_Scores.js"></script> -->
</body>
</html>

