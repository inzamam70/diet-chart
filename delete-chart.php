
<?php
include_once("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM chart WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: charts.php");
} else {
    echo "Error";
}
?>