<?php
// Melissa Guevara Hernandez

// Start the message and flag variable.
$msg = "<p>Please <a href=\"donation2.html\">GO BACK</a> and fix the following errors:</p>\n";
$okay = true;

// Retrieve the form values and remove extra spaces.
$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$amount_raw = trim($_POST['amount'] ?? '');

// Validates the first name.
if (empty($fname)) {
    $msg .= "<p>Please enter your first name.</p>\n";
    $okay = false;
}

// Validates the last name.
if (empty($lname)) {
    $msg .= "<p>Please enter your last name.</p>\n";
    $okay = false;
}

// Validates the email address.
if (empty($email)) {
    $msg .= "<p>Please enter your email address.</p>\n";
    $okay = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg .= "<p>Please enter a valid email address.</p>\n";
    $okay = false;
}

// Validates the donation amount.
if ($amount_raw === '') {
    $msg .= "<p>Please enter a donation amount.</p>\n";
    $okay = false;
} elseif (!is_numeric($amount_raw)) {
    $msg .= "<p>The donation amount must be a number.</p>\n";
    $okay = false;
} elseif ($amount_raw <= 0) {
    $msg .= "<p>The donation amount must be greater than zero.</p>\n";
    $okay = false;
}

// Build the success message only when all values are valid.
if ($okay) {

    // Format the donation amount.
    $formatted_amount = number_format((float) $amount_raw, 2);

    // Create the confirmation number.
    $name_length = strlen($lname);
    $first_letter = strtoupper(substr($lname, 0, 1));
    $random_number = random_int(1000, 9999);
    $confirmation = $name_length . $first_letter . $random_number;

    // Determine whether the subscription checkbox was checked.
    if (isset($_POST['subscription'])) {
        $subscription_status = 'no_subscription';
    } else {
        $subscription_status = 'subscription';
    }

    // Choose the subscription message.
    switch ($subscription_status) {
        case 'no_subscription':
            $subscription_msg = "You have chosen not to receive a free one-year subscription to our e-magazine.";
            break;

        case 'subscription':
            $subscription_msg = "You will receive a free one-year subscription to our e-magazine.";
            break;
    }

    // Determine the donation level.
    if ($amount_raw >= 100) {
        $donation_level = "Gold Supporter";
    } elseif ($amount_raw >= 50) {
        $donation_level = "Silver Supporter";
    } elseif ($amount_raw >= 25) {
        $donation_level = "Bronze Supporter";
    } else {
        $donation_level = "Friend of the Animals";
    }

    // Repeat the thank-you message with a for loop.
    $thank_you = '';

    for ($i = 1; $i <= 3; $i++) {
        $thank_you .= "Thank you! ";
    }

    // Escape user-entered values before displaying them.
    $safe_fname = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
    $safe_lname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
    $safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safe_confirmation = htmlspecialchars($confirmation, ENT_QUOTES, 'UTF-8');

    // Replace the error message with the success message.
    $msg = "<p>Thank you $safe_fname $safe_lname for your donation of \$$formatted_amount.</p>\n";
    $msg .= "<p>Your confirmation number is $safe_confirmation.</p>\n";
    $msg .= "<p>We will email your receipt to $safe_email.</p>\n";
    $msg .= "<p>$subscription_msg</p>\n";
    $msg .= "<p>Your donation level is $donation_level.</p>\n";
    $msg .= "<p>$thank_you</p>\n";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Confirmation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 100%;
        }

        #outer {
            width: 960px;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #a8a8a8;
            background-color: aliceblue;
        }

        h1 {
            color: navy;
            text-align: center;
        }
    </style>
</head>

<body>
    <section id="outer">
        <h1>Donation Confirmation</h1>
        <?php echo $msg; ?>
    </section>
</body>

</html>
