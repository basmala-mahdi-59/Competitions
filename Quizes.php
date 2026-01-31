<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Quizes.css">

    <title>Quiz</title>

</head>
<body>
    <form action="Quizes_Process.php" method="POST" id="form">
        <h2 class="Form-Tittle">Quiz</h2>
        <label for="Choose">Choose Quiz Type</label>
        <select name="Choose" id="Choose" onchange="toggleForm()">
            <option value="-"></option>
            <option value="Programming">Programming</option>
            <option value="Sport">Sport</option>
        </select>
        <div id="Questions">
            <!-- Questions will be loaded here based on selected type -->
        </div>
        <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
        <?php if ($_GET['type'] == 'individual') { ?>
            <input type="hidden" name="member_id" value="<?php echo $_GET['member_id']; ?>">
        <?php } else { ?>
            <input type="hidden" name="team_id" value="<?php echo $_GET['team_id']; ?>">
        <?php } ?>
        <button type="submit" id="submit">Submit</button>
    </form>

    <script src="js/Quizes.js"></script>
</body>
</html>
