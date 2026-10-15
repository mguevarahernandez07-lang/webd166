<?php

// ----------------------------------------------------
// Assignment 7: Arrays - Pizza Order
// ----------------------------------------------------

// Creates an associative array of pizza toppings.

$allowedToppings = [
    'extra_cheese' => 'Extra Cheese',
    'pepperoni' => 'Pepperoni',
    'sausage' => 'Sausage',
    'meatballs' => 'Meatballs',
    'tomato' => 'Tomato',
    'onion' => 'Onion',
    'olives' => 'Olives',
    'peppers' => 'Peppers',
    'mushroom' => 'Mushroom',
    'spinach' => 'Spinach',
    'garlic' => 'Garlic',
    'cilantro' => 'Cilantro'
];

// Initialize variables.

$name = '';
$phone = '';
$toppings = [];

$basePrice = 7.95;
$toppingPrice = 1.00;

$count = 0;
$cost = $basePrice;

// Retrieve the submitted form values.

$name = trim((string)($_POST['name'] ?? ''));

$phone = trim((string)($_POST['phone'] ?? ''));

// Retrieve the checkbox array.

$toppings = $_POST['topping'] ?? [];

// Make sure toppings contains an array.

if (!is_array($toppings)) {
    $toppings = [];
}

// Count the selected toppings.

$count = count($toppings);

// Calculate the total pizza cost.

$cost = $basePrice + ($count * $toppingPrice);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pizza Order Results</title>

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 1rem;
            font-family: Arial, sans-serif;
            font-size: 100%;
            line-height: 1.5;
            color: #222;
            background-color: #111;
        }

        main {
            width: min(90%, 50rem);
            margin: 2rem auto;
            padding: 1.5rem;
            background-color: #f5f5f5;
            border-radius: 0.5rem;
        }

        header {
            margin-bottom: 2rem;
            text-align: center;
        }

        h1 {
            margin-bottom: 0.5rem;
            color: red;
        }

        h2 {
            margin-top: 0;
        }

        .customer-info {
            margin-bottom: 2rem;
        }

        .total {
            margin-top: 2rem;
            font-size: 1.25rem;
            font-weight: bold;
            color: #b00020;
        }

        .return-link {
            margin-top: 2rem;
        }
    </style>
</head>

<body>

    <main>

        <header>
            <h1>Pizza Express</h1>
            <h2>Your Pizza Order</h2>
        </header>

        <section class="customer-info">

            <h3>Customer Information</h3>

            <p>
                <strong>Name:</strong>

                <?= htmlspecialchars(
                    $name,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ) ?>
            </p>

            <p>
                <strong>Phone:</strong>

                <?= htmlspecialchars(
                    $phone,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ) ?>
            </p>

        </section>

        <?php if ($toppings === []): ?>

            <h3>Your Pizza</h3>

            <p>
                You did not order any extra toppings,
                so you will receive our traditional
                cheese pizza.
            </p>

        <?php else: ?>

            <h3>Your Toppings</h3>

            <p>
                You ordered

                <?= $count ?> topping(s):
            </p>

            <ul>

                <?php foreach ($toppings as $topping): ?>

                    <?php if (isset($allowedToppings[$topping])): ?>

                        <li>

                            <?= htmlspecialchars(
                                $allowedToppings[$topping],
                                ENT_QUOTES | ENT_SUBSTITUTE,
                                'UTF-8'
                            ) ?>

                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

        <p class="total">
            Total Cost:

            $<?= number_format($cost, 2) ?>
        </p>

        <p class="return-link">
            <a href="pizza_order.html">
                Return to the Pizza Order Form
            </a>
        </p>

    </main>

</body>

</html>
