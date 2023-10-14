
<?php
include_once("conn.php");
$id=$_GET["id"];
$sql="DELETE FROM categories WHERE id='$id'";
$result=mysqli_query($conn,$sql);
if($result){

    echo "<script>alert('Category Deleted Successfully')</script>";
    header("location:categories.php");
}
else{
    echo "<script>alert('Category Deleted Failed')</script>";
}


?>