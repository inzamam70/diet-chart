<?php
include_once("conn.php");
$id=$_GET["id"];
$sql="DELETE FROM sliders WHERE id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Slider Deleted Successfully')</script>";
    header("Location: sliders.php");

}
else{
    echo "<script>alert('Slider Deleted Failed')</script>";
}



?>