
<?php
// Chapter 9: PHP Sessions and a Multi-Page Form
// Name:

// Start or resume the session.
session_start();

// Create an array containing the valid education choices.
$validEducation = [
    'High School',
    'Associate Degree',
    "Bachelor's Degree",
    "Master's Degree",
    'Doctoral Degree'
];

// Process the form only when this page receives a POST request.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the submitted education value.
    $education = $_POST['education'] ?? '';

    // Validate the submitted education against the allowed choices.
    if (!in_array($education, $validEducation, true)) {
        exit('Invalid education selection.');
    }

    // Prevent users from skipping previous pages.
    if (!isset($_SESSION['age'])) {
        header('Location: survey.php');
        exit;
    }

    // Store the valid education value in the session.
    $_SESSION['education'] = $education;

    // Redirect to this page after successfully processing the POST request.
    header('Location: survey3.php');
    exit;
}

// Prevent this page from being viewed if previous responses are missing.
if (!isset($_SESSION['age'], $_SESSION['education'])) {
    header('Location: survey.php');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey - Page 3</title>
    <link rel="stylesheet" href="survey.css">
</head>

<body>
    <div class="wrapper">

        <header>
            <h1>Anonymous Survey - Page 3</h1>

            <img class="survey-image"
                 src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705"
                 alt="Survey clipboard">
        </header>

        <main>
            <form action="survey_result.php" method="post">

                <fieldset>
                    <legend>What is your income bracket?</legend>

                    <div class="choice">
                        <input type="radio"
                               id="under20"
                               name="income"
                               value="under $20,000"
                               required>
                        <label for="under20">Under $20,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income20-39"
                               name="income"
                               value="$20,000 to $39,000">
                        <label for="income20-39">$20,000 to $39,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income40-59"
                               name="income"
                               value="$40,000 to $59,000">
                        <label for="income40-59">$40,000 to $59,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income60-80"
                               name="income"
                               value="$60,000 to $80,000">
                        <label for="income60-80">$60,000 to $80,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="over80"
                               name="income"
                               value="over $80,000">
                        <label for="over80">Over $80,000</label>
                    </div>

                </fieldset>

                <button type="submit">Next &gt;&gt;</button>

            </form>
        </main>

    </div>
</body>

</html>
