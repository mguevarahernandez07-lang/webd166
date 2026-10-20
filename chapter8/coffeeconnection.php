
<?php

// Initialize variables.
$fname = '';
$lname = '';
$email = '';
$age = false;

$fnameError = '';
$lnameError = '';
$emailError = '';
$ageError = '';

// Check if the form was submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve submitted values.
    $fname = trim((string)($_POST['fname'] ?? ''));
    $lname = trim((string)($_POST['lname'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $age = isset($_POST['age']);

    $okay = true;

    // Validate first name.
    if ($fname === '') {
        $fnameError = 'Please enter your first name.';
        $okay = false;
    }

    // Validate last name.
    if ($lname === '') {
        $lnameError = 'Please enter your last name.';
        $okay = false;
    }

    // Validate email.
    if ($email === '') {
        $emailError = 'Please enter your email address.';
        $okay = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid email address.';
        $okay = false;
    }

    // Validate age checkbox.
    if (!$age) {
        $ageError = 'You must confirm that you are over 18.';
        $okay = false;
    }

    // Redirect if all information is valid.
    if ($okay) {
        header('Location: subscribed.php');
        exit;
    }
}

// Load the reusable header.
require 'includes/header.php';

?>

<main id="content">

    <h2 class="center">Welcome to Coffee Connection!</h2>

    <p>
        We’re not just passionate lovers of coffee, but everything else that goes
        with a full and rewarding coffeehouse experience. We also offer a selection
        of premium teas, fine pastries, and other delectable treats. The music you
        hear in store is chosen for its artistry and appeal. It’s not unusual to see
        people coming to Coffee Connection to chat, meet up, or even work. We’re a
        neighborhood gathering place, a part of the daily routine, and would like
        to be part of your way of life.
    </p>

    <section id="contact">

        <h2 class="center">Sign Up to Receive Our Newsletter</h2>

        <form method="post" novalidate>

            <div class="flexcontainer">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname"
                    value="<?= htmlspecialchars($fname, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <?php if ($fnameError !== ''): ?>
                <p class="red"><?= $fnameError ?></p>
            <?php endif; ?>

            <div class="flexcontainer">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" id="lname"
                    value="<?= htmlspecialchars($lname, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <?php if ($lnameError !== ''): ?>
                <p class="red"><?= $lnameError ?></p>
            <?php endif; ?>

            <div class="flexcontainer">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email"
                    value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <?php if ($emailError !== ''): ?>
                <p class="red"><?= $emailError ?></p>
            <?php endif; ?>

            <div class="flexcontainer2">
                <label for="age">I am over 18:</label>
                <input type="checkbox" name="age" id="age"
                    value="yes" <?= $age ? 'checked' : '' ?>>
            </div>

            <?php if ($ageError !== ''): ?>
                <p class="red"><?= $ageError ?></p>
            <?php endif; ?>

            <div class="form-actions">
                <button type="submit">Submit</button>
                <a class="clear-link" href="coffeeconnection.php">Clear Form</a>
            </div>

        </form>

    </section>

    <section id="products">

        <div class="product center">
            <h3>Espresso</h3>
            <p>
                <img src="images/coffee_espresso.jpg" alt="Espresso coffee">
            </p>
            <p>
                Popular espresso beverages — latte, americano,
                cappuccino, macchiato, and cold espresso drinks
            </p>
        </div>

        <div class="product center">
            <h3>Blended</h3>
            <p>
                <img src="images/coffee_blended.jpg" alt="Blended coffee drinks">
            </p>
            <p>Delicious icy blends</p>
        </div>

        <div class="product center">
            <h3>Pastries</h3>
            <p>
                <img src="images/coffee_pastries.jpg" alt="Pastries">
            </p>
            <p>Muffins, bagels, coffee cakes, and more</p>
        </div>

        <div class="product center">
            <h3>Food</h3>
            <p>
                <img src="images/coffee_food.jpg"
                     alt="Sandwiches, salads, and other food">
            </p>
            <p>Sandwiches, paninis, salads, and more</p>
        </div>

        <div class="product center">
            <h3>Breakfast</h3>
            <p>
                <img src="images/coffee_breakfast.jpg" alt="Breakfast food">
            </p>
            <p>
                Biscuits, muffins, wraps, croissants,
                oatmeal, and more
            </p>
        </div>

    </section>

</main>

<?php

// Load the reusable footer.
require 'includes/footer.php';

?>

