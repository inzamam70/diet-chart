
<?php 
 include_once("conn.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM doctro WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location: dietitians.php");
    }else{
        echo "Error";
    }
    
?>