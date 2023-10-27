
<?php
session_start();
include_once "conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM blogs WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('Blog Deleted Successfully')</script>";
    header("location:products.php");
}
else{
    echo "<script>alert('Blog Deleted Failed')</script>";
}

?>