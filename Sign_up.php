<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Sign_up.css">
    <title>Sign Up Form</title>

</head>
<body>
    <form action="Sign_up_Process.php" method="POST" id="form">
        <h2 class="Form-Tittle">Sign Up Form</h2>
        <label for="userType">Select User Type:</label>
        <select id="userType" name="userType" onchange="toggleForm()" required>
            <option value="">-</option>
            <option value="Individual">Individual</option>
            <option value="Team">Team</option>
        </select><br><br>
        <!-- Individual Sign Up Form -->
        <div class="individual-form">
            <label for="individualName">Enter Your Name:</label>
            <input type="text" id="individualName" name="individualName"><br><br>
            <input type="submit" value="Next" id="submit">
        </div>
        <!-- Team Sign Up Form -->
        <div class="team-form">
            <label for="teamName">Enter Team Name:</label>
            <input type="text" id="teamName" name="teamName"><br><br>
            <label for="member1">Member 1:</label>
            <input type="text" id="member1" name="members[]"><br><br>
            <label for="member2">Member 2:</label>
            <input type="text" id="member2" name="members[]"><br><br>
            <label for="member3">Member 3:</label>
            <input type="text" id="member3" name="members[]"><br><br>
            <label for="member4">Member 4:</label>
            <input type="text" id="member4" name="members[]"><br><br>
            <label for="member5">Member 5:</label>
            <input type="text" id="member5" name="members[]"><br><br>
            <input type="submit" value="Next" id="submit">
        </div>
    </form>
    <script src="js/Sign_up.js"></script>
</body>
</html>
