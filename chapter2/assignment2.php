<?php
// Stores the Googleplex information in variables
$heading = "Googleplex";
$street = "1600 Amphitheatre Parkway";
$city = "Mountain View";
$state = "CA";
$country = "United States";
?>

<!doctype html>
<!-- Melissa Guevara Hernandez -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melissa Guevara Hernandez - Googleplex</title>
</head>

<body>

<?php
echo "<h1>$heading</h1>\n";

echo "<p>The $heading is the corporate headquarters complex of Google and its parent company Alphabet Inc. It is located at:<br>\n";
echo "$street<br>\n";
echo "$city, $state, $country</p>\n";
?>

</body>
</html>
