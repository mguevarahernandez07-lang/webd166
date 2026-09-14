<?php

// Retrieve the name entered in the form.
$name = $_POST['name'];

// Retrieve the email entered in the form.
$email = $_POST['email'];

// Retrieve the phone number entered in the form.
$phone = $_POST['phone'];

// Retrieve how the user heard about us.
$heard = $_POST['heard'];

// Retrieve the comments entered in the form.
$comments = $_POST['comments'];

?>
<!DOCTYPE html>
<!-- Melissa Guevara Hernandez -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Account Sign Up Results</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <main>
        <h1>Account Sign Up Results</h1>

        <p><strong>Name:</strong> <?php print $name; ?></p>

        <p><strong>Email:</strong> <?php print $email; ?></p>

        <p><strong>Phone:</strong> <?php print $phone; ?></p>

        <p><strong>Heard:</strong> <?php print $heard; ?></p>

        <p><strong>Comments:</strong> <?php print $comments; ?></p>
    </main>
</body>

</html>
