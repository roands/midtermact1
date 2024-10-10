<!DOCTYPE html>
<html>
<head>
    <title>Jeepney Fare Calculator</title>
</head>
<body>

<h2>Jeepney Fare Calculator</h2>

<form method="post" action="">
    Distance (in km): <input type="number" name="distance" step="0.01" required><br><br>
    Passenger Type: 
    <input type="radio" name="passenger_type" value="regular" required> Regular
    <input type="radio" name="passenger_type" value="student_elderly" required> Student/Elderly<br><br>
    <input type="submit" name="submit" value="Calculate Fare">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $base_fare = 13.00;
    $base_distance = 5;
    $additional_rate = 1.75;
    $discount_rate = 0.20;

  
    $distance = $_POST['distance'];
    $passenger_type = $_POST['passenger_type'];

   
    if ($distance <= $base_distance) {
        $total_fare = $base_fare;
    } else {
        $total_fare = $base_fare + (($distance - $base_distance) * $additional_rate);
    }


    if ($passenger_type == "student_elderly") {
        $total_fare = $total_fare - ($total_fare * $discount_rate);
    }

   
    echo "<h3>Total Fare: Php " . number_format($total_fare, 2) . "</h3>";
}
?>

</body>
</html> 