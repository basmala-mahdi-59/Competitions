<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Individual_Login.css">
    <title>Search Member</title>
</head>
<body>
        <!-- Form for searching by member name or member ID -->
        <form method="POST" action="">
        <h2>Search by Member</h2>
        <label for="member_id">Member ID:</label>
        <input type="text" id="member_id" name="member_id"><br><br>

        <label for="member_name">Member Name:</label>
        <input type="text" id="member_name" name="member_name"><br><br>

        <input type="submit" name="search_member" value="Search Member" class="Submit"> <br> <br> <br>
    <hr>

<?php echo '<link rel="stylesheet" href="css/Individual_Login.css">';

// Database connection
include("config.php");


// Handle member search
if (isset($_POST['search_member']))
{
    $member_id = $_POST['member_id'];
    $name = $_POST['member_name'];

    // Search by member ID or member name
    $sql = "SELECT * FROM individuals WHERE member_id='$member_id' AND name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        // Output member information
        if ($row = $result->fetch_assoc()) 
        {
            echo "<h3>Member Information</h3>";
            echo "<div>Member ID: " . $row["member_id"] . "</div><br>";
            echo "<div>Member Name: " . $row["name"] . "</div><br>";
            echo "<div>Score: " . $row["score"] . "</div><br>";
            echo "<button class='Play'><a href='Index.php' id='Home'>Home Page</a></button>";

        }
    } 
    else 
    {
        echo "<div  style='width: 70%; margin: auto; margin-top: 60px; color: red; margin-bottom: 50px; text-align: center;' >No member found with the given ID or name.</div>";
        echo "<button class='Play' id='Home'><a href='Sign_up.php'>Register And Play</a></button>";
        echo "<button class='Play2'><a href='Index.php' id='Home'>Home Page</a></button>";

    }
} ?>

    </form>

</body>
</html>
