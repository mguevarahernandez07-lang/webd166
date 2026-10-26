
<?php
// Chapter 9: PHP Sessions and a Multi-Page Form


// Start or resume the session.
session_start();

// Clear the previous survey responses.
unset($_SESSION['age'], $_SESSION['education'], $_SESSION['income']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">

    <header>
        <h1>Please Take Our Anonymous Survey</h1>

        <img class="survey-image"
             src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705"
             alt="Survey clipboard">
    </header>

    <main>
        <form action="survey2.php" method="post">
            <fieldset>
                <legend>What is your age group?</legend>

                <div class="choice">
                    <input type="radio" id="under18" name="age" value="under 18" required>
                    <label for="under18">Under 18</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age18-29" name="age" value="18 - 29">
                    <label for="age18-29">18 - 29</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age30-49" name="age" value="30 - 49">
                    <label for="age30-49">30 - 49</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age50-65" name="age" value="50 - 65">
                    <label for="age50-65">50 - 65</label>
                </div>

                <div class="choice">
                    <input type="radio" id="over65" name="age" value="over 65">
                    <label for="over65">Over 65</label>
                </div>

            </fieldset>

            <button type="submit">Next &gt;&gt;</button>
        </form>
    </main>

</div>
</body>
</html>
