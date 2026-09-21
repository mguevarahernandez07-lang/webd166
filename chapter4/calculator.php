<?php
// Retrieves values from the form.
$milesDriven = $_POST["miles_driven"];
$gallonsUsed = $_POST["gallons_used"];
$priceGallon = $_POST["price_gallon"];

// Calculates miles per gallon.
$mpg = $milesDriven / $gallonsUsed;

// Calculates the cost of the trip.
$tripCost = $gallonsUsed * $priceGallon;
?>

<!doctype html>
<!-- Melissa Guevara Hernandez -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trip Calculator Results</title>
</head>

<body>

    <h1>Trip Calculator Results</h1>

    <p>Miles Driven:
        <?php echo number_format($milesDriven); ?>
    </p>

    <p>Gallons Used:
        <?php echo number_format($gallonsUsed, 1); ?>
    </p>

    <p>Price per Gallon:
        <?php echo "$" . number_format($priceGallon, 2); ?>
    </p>

    <p>Miles Per Gallon:
        <?php echo number_format($mpg, 2); ?>
    </p>

    <p>Cost of the Trip:
        <?php echo "$" . number_format($tripCost, 2); ?>
    </p>

</body>

</html>