<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
function d($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function dd($var)
{
    d($var);
    die();
}

?>