
<?php 
include_once "conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:products.php");
}
else{
    echo "<script>alert('Product Deleted Failed')</script>";
}
?>