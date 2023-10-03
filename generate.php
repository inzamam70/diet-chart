<!DOCTYPE html>
<html>
<head>
    <title>Diet Chart Calculator</title>
    <link rel="stylesheet" href="./css/generate.css">
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mealName = $_POST["meal"]; // Use a different variable name here
    $calories = $_POST["calories"];
    
    // Store meal data in a session variable for simplicity (in a real app, use a database)
    $_SESSION["meals"][] = [
        "meal" => $mealName, // Update the variable name here
        "calories" => $calories,
    ];
    
    // Calculate daily calorie intake
    $totalCalories = 0;
    foreach ($_SESSION["meals"] as $meal) {
        $totalCalories += $meal["calories"];
    }
    
    // Display the meal added and daily calorie intake
    echo "<h2>Diet Chart</h2>";
    echo "<p>Meal: $mealName</p>"; // Update the variable name here
    echo "<p>Calories: $calories</p>";
    echo "<p>Daily Calorie Intake: $totalCalories</p>";
}
?>




    <div class="container">
        <h1>Diet Chart Calculator</h1>
        <form action="" method="post">
            <label for="meal">Meal:</label>
            <input type="text" name="meal" required>
            
            <label for="calories">Calories:</label>
            <input type="number" name="calories" required>
            
            <input type="submit" value="Add Meal">
        </form>
    </div>
</body>
</html>
