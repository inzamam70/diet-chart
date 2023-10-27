
<?php 
session_start();
include_once "conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM special WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:special.php");
}
else{
    echo "<script>alert('Specialist Deleted Failed')</script>";
}

?>