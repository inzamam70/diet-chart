<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mealName = $_POST["meal"];
    $calories = $_POST["calories"];

    $_SESSION["meals"][] = [
        "meal" => $mealName,
        "calories" => $calories,
    ];

    
    header("Location: generate.php");
    exit;
}
?>
