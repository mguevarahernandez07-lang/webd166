<?php
// start the message variable.
$msg = '';

// Get and clean values from the form.
$fname = trim($_POST['first_name'] ?? '');
$lname = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');

$safe_fname = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
$safe_lname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
$safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

// Format the donation amount to two decimal places.
$donation = $_POST['donation'] ?? 0;
$donation = number_format($donation, 2);

// Create a random confirmation number.
$rand = random_int(1000, 9999);

// Get the first letter of the last name and convert it to uppercase.
$last_initial = strtoupper(substr($lname, 0, 1));

// Count the number of characters in the last name.
$length = strlen($lname);

// Combine the values to create the confirmation number.
$conf = $length . $last_initial . $rand;

// Create the confirmation message.
$msg = "<p>Thank you $safe_fname $safe_lname for your donation of \$$donation.</p>";
$msg .= "<p>Your confirmation number is $conf. We will email your receipt to $safe_email.</p>";

?>

<!DOCTYPE html>
<!-- Student Name: Melissa Guevara Hernandez -->
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Confirmation</title>

    <style>
        body {
            font-family: arial;
            font-size: 100%;
        }

        #outer {
            width: 960px;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #a8a8a8;
            box-shadow: 0px 0px 20px #a8a8a8;
            background-color: aliceblue;
        }

        h1,
        h2 {
            font-size: 1.5em;
            color: navy;
            text-align: center;
        }

        .info {
            text-align: left;
        }

        input {
            display: block;
            margin-bottom: 25px;
        }

        input[type=submit] {
            margin-top: 25px;
        }
    </style>

</head>

<body>
    <header>
        <h1>Humane Society Donations</h1>
        <h2>Help the Animals</h2>
    </header>

    <section id="outer">
        <h1 class="info">Your Contribution</h1>

        <?php echo $msg; ?>

    </section>

</body>

</html>
